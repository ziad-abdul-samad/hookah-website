<?php
declare(strict_types=1);

function get_dashboard_stats(): array
{
    return [
        'sections' => (int) db()->query('SELECT COUNT(*) FROM sections')->fetchColumn(),
        'products' => (int) db()->query('SELECT COUNT(*) FROM products')->fetchColumn(),
        'images' => (int) db()->query('SELECT COUNT(*) FROM product_images')->fetchColumn(),
    ];
}

function get_sections(?string $search = null): array
{
    $sql = 'SELECT sections.*, COUNT(products.id) AS product_count
            FROM sections
            LEFT JOIN products ON products.section_id = sections.id';
    $params = [];

    if ($search) {
        $sql .= ' WHERE sections.name LIKE :search OR sections.description LIKE :search';
        $params['search'] = '%' . $search . '%';
    }

    $sql .= ' GROUP BY sections.id ORDER BY sections.sort_order ASC, sections.name ASC';

    $statement = db()->prepare($sql);
    $statement->execute($params);

    return $statement->fetchAll();
}

function get_section_by_id(int $sectionId): ?array
{
    $statement = db()->prepare('SELECT * FROM sections WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $sectionId]);
    $section = $statement->fetch();

    return $section ?: null;
}

function create_section(array $data): int
{
    $slug = make_unique_slug('sections', $data['slug'] ?: $data['name']);

    $statement = db()->prepare(
        'INSERT INTO sections (name, slug, description, sort_order) VALUES (:name, :slug, :description, :sort_order)'
    );

    $statement->execute([
        'name' => $data['name'],
        'slug' => $slug,
        'description' => $data['description'],
        'sort_order' => $data['sort_order'],
    ]);

    return (int) db()->lastInsertId();
}

function update_section(int $sectionId, array $data): void
{
    $slug = make_unique_slug('sections', $data['slug'] ?: $data['name'], $sectionId);

    $statement = db()->prepare(
        'UPDATE sections SET name = :name, slug = :slug, description = :description, sort_order = :sort_order WHERE id = :id'
    );

    $statement->execute([
        'id' => $sectionId,
        'name' => $data['name'],
        'slug' => $slug,
        'description' => $data['description'],
        'sort_order' => $data['sort_order'],
    ]);
}

function delete_section(int $sectionId): void
{
    $paths = fetch_section_image_paths($sectionId);

    $statement = db()->prepare('DELETE FROM sections WHERE id = :id');
    $statement->execute(['id' => $sectionId]);

    foreach ($paths as $path) {
        delete_uploaded_image($path);
    }
}

function get_products(array $filters = []): array
{
    $sql = 'SELECT products.*, sections.name AS section_name,
            (
                SELECT product_images.image_path
                FROM product_images
                WHERE product_images.product_id = products.id
                ORDER BY product_images.sort_order ASC, product_images.id ASC
                LIMIT 1
            ) AS cover_image,
            (
                SELECT COUNT(*)
                FROM product_images
                WHERE product_images.product_id = products.id
            ) AS image_count
            FROM products
            INNER JOIN sections ON sections.id = products.section_id
            WHERE 1 = 1';
    $params = [];

    if (!empty($filters['search'])) {
        $sql .= ' AND (products.name LIKE :search OR products.description LIKE :search OR products.attributes_text LIKE :search OR sections.name LIKE :search)';
        $params['search'] = '%' . $filters['search'] . '%';
    }

    if (!empty($filters['section_id'])) {
        $sql .= ' AND products.section_id = :section_id';
        $params['section_id'] = (int) $filters['section_id'];
    }

    $sql .= ' ORDER BY products.created_at DESC';

    if (!empty($filters['limit'])) {
        $sql .= ' LIMIT :limit';
    }

    $statement = db()->prepare($sql);

    foreach ($params as $key => $value) {
        $statement->bindValue(':' . $key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    if (!empty($filters['limit'])) {
        $statement->bindValue(':limit', (int) $filters['limit'], PDO::PARAM_INT);
    }

    $statement->execute();

    return $statement->fetchAll();
}

function get_home_sections_with_products(int $limit = 4): array
{
    $sections = get_sections();

    foreach ($sections as &$section) {
        $section['products'] = get_products([
            'section_id' => (int) $section['id'],
            'limit' => $limit,
        ]);
    }

    unset($section);

    return $sections;
}

function get_product_by_id(int $productId): ?array
{
    $statement = db()->prepare(
        'SELECT products.*, sections.name AS section_name
         FROM products
         INNER JOIN sections ON sections.id = products.section_id
         WHERE products.id = :id
         LIMIT 1'
    );
    $statement->execute(['id' => $productId]);
    $product = $statement->fetch();

    if (!$product) {
        return null;
    }

    $product['images'] = get_product_images($productId);

    return $product;
}

function get_product_by_slug(string $slug): ?array
{
    $statement = db()->prepare(
        'SELECT products.*, sections.name AS section_name
         FROM products
         INNER JOIN sections ON sections.id = products.section_id
         WHERE products.slug = :slug
         LIMIT 1'
    );
    $statement->execute(['slug' => $slug]);
    $product = $statement->fetch();

    if (!$product) {
        return null;
    }

    $product['images'] = get_product_images((int) $product['id']);

    return $product;
}

function create_product(array $data, array $imagePaths): int
{
    $pdo = db();
    $slug = make_unique_slug('products', $data['slug'] ?: $data['name']);

    try {
        $pdo->beginTransaction();

        $statement = $pdo->prepare(
            'INSERT INTO products (section_id, name, slug, attributes_text, description, price)
             VALUES (:section_id, :name, :slug, :attributes_text, :description, :price)'
        );

        $statement->execute([
            'section_id' => $data['section_id'],
            'name' => $data['name'],
            'slug' => $slug,
            'attributes_text' => $data['attributes_text'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);

        $productId = (int) $pdo->lastInsertId();
        persist_product_images($productId, $imagePaths);

        $pdo->commit();

        return $productId;
    } catch (Throwable $exception) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        foreach ($imagePaths as $path) {
            delete_uploaded_image($path);
        }

        throw $exception;
    }
}

function update_product(int $productId, array $data, array $newImagePaths, array $removeImageIds, array $imageSortOrder): void
{
    $pdo = db();
    $slug = make_unique_slug('products', $data['slug'] ?: $data['name'], $productId);
    $pathsToDelete = [];

    try {
        $pdo->beginTransaction();

        $statement = $pdo->prepare(
            'UPDATE products
             SET section_id = :section_id, name = :name, slug = :slug, attributes_text = :attributes_text, description = :description, price = :price
             WHERE id = :id'
        );

        $statement->execute([
            'id' => $productId,
            'section_id' => $data['section_id'],
            'name' => $data['name'],
            'slug' => $slug,
            'attributes_text' => $data['attributes_text'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);

        if ($removeImageIds !== []) {
            $pathsToDelete = fetch_product_image_paths($productId, $removeImageIds);
            $deleteStatement = $pdo->prepare('DELETE FROM product_images WHERE product_id = :product_id AND id = :id');

            foreach ($removeImageIds as $imageId) {
                $deleteStatement->execute([
                    'product_id' => $productId,
                    'id' => (int) $imageId,
                ]);
            }
        }

        if ($imageSortOrder !== []) {
            $sortStatement = $pdo->prepare('UPDATE product_images SET sort_order = :sort_order WHERE product_id = :product_id AND id = :id');

            foreach ($imageSortOrder as $imageId => $sortOrder) {
                $sortStatement->execute([
                    'product_id' => $productId,
                    'id' => (int) $imageId,
                    'sort_order' => max(0, (int) $sortOrder),
                ]);
            }
        }

        persist_product_images($productId, $newImagePaths);

        $pdo->commit();
    } catch (Throwable $exception) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        foreach ($newImagePaths as $path) {
            delete_uploaded_image($path);
        }

        throw $exception;
    }

    foreach ($pathsToDelete as $path) {
        delete_uploaded_image($path);
    }
}

function delete_product(int $productId): void
{
    $paths = fetch_product_image_paths($productId);

    $statement = db()->prepare('DELETE FROM products WHERE id = :id');
    $statement->execute(['id' => $productId]);

    foreach ($paths as $path) {
        delete_uploaded_image($path);
    }
}

function get_product_images(int $productId): array
{
    $statement = db()->prepare('SELECT * FROM product_images WHERE product_id = :product_id ORDER BY sort_order ASC, id ASC');
    $statement->execute(['product_id' => $productId]);

    return $statement->fetchAll();
}

function persist_product_images(int $productId, array $imagePaths): void
{
    if ($imagePaths === []) {
        return;
    }

    $statement = db()->prepare(
        'INSERT INTO product_images (product_id, image_path, sort_order) VALUES (:product_id, :image_path, :sort_order)'
    );

    $sortOrder = next_product_image_sort_order($productId);

    foreach ($imagePaths as $path) {
        $statement->execute([
            'product_id' => $productId,
            'image_path' => $path,
            'sort_order' => $sortOrder,
        ]);
        $sortOrder++;
    }
}

function next_product_image_sort_order(int $productId): int
{
    $statement = db()->prepare('SELECT COALESCE(MAX(sort_order), -1) + 1 FROM product_images WHERE product_id = :product_id');
    $statement->execute(['product_id' => $productId]);

    return (int) $statement->fetchColumn();
}

function fetch_product_image_paths(int $productId, array $onlyImageIds = []): array
{
    $sql = 'SELECT image_path FROM product_images WHERE product_id = :product_id';
    $params = ['product_id' => $productId];

    if ($onlyImageIds !== []) {
        $placeholders = [];
        foreach ($onlyImageIds as $index => $imageId) {
            $placeholder = ':image_' . $index;
            $placeholders[] = $placeholder;
            $params['image_' . $index] = (int) $imageId;
        }
        $sql .= ' AND id IN (' . implode(', ', $placeholders) . ')';
    }

    $statement = db()->prepare($sql);
    $statement->execute($params);

    return array_column($statement->fetchAll(), 'image_path');
}

function fetch_section_image_paths(int $sectionId): array
{
    $statement = db()->prepare(
        'SELECT product_images.image_path
         FROM product_images
         INNER JOIN products ON products.id = product_images.product_id
         WHERE products.section_id = :section_id'
    );
    $statement->execute(['section_id' => $sectionId]);

    return array_column($statement->fetchAll(), 'image_path');
}

function make_unique_slug(string $table, string $source, ?int $ignoreId = null): string
{
    $allowedTables = ['sections', 'products'];

    if (!in_array($table, $allowedTables, true)) {
        throw new InvalidArgumentException('Unsupported table for slug generation.');
    }

    $base = slugify($source);
    $candidate = $base;
    $suffix = 2;

    while (slug_exists($table, $candidate, $ignoreId)) {
        $candidate = $base . '-' . $suffix;
        $suffix++;
    }

    return $candidate;
}

function slug_exists(string $table, string $slug, ?int $ignoreId = null): bool
{
    $sql = "SELECT COUNT(*) FROM {$table} WHERE slug = :slug";
    $params = ['slug' => $slug];

    if ($ignoreId !== null) {
        $sql .= ' AND id != :id';
        $params['id'] = $ignoreId;
    }

    $statement = db()->prepare($sql);
    $statement->execute($params);

    return (int) $statement->fetchColumn() > 0;
}
