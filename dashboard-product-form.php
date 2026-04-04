<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

$sections = get_sections();

if ($sections === []) {
    set_flash('error', 'Create at least one section before adding products.');
    redirect('dashboard-section-form.php');
}

$currentPage = 'products';
$productId = request_query_int('id');
$editingProduct = $productId ? get_product_by_id($productId) : null;

if ($productId && !$editingProduct) {
    abort(404, 'Product not found.');
}

$pageTitle = app_name() . ($editingProduct ? ' | Edit Product' : ' | Add Product');
$errors = [];
$existingImages = $editingProduct['images'] ?? [];
$existingImageIds = array_map(static fn (array $image): int => (int) $image['id'], $existingImages);
$removeImageIds = [];
$imageSortOrder = [];
$form = [
    'section_id' => (string) ($editingProduct['section_id'] ?? (string) $sections[0]['id']),
    'name' => (string) ($editingProduct['name'] ?? ''),
    'slug' => (string) ($editingProduct['slug'] ?? ''),
    'attributes_text' => (string) ($editingProduct['attributes_text'] ?? ''),
    'description' => (string) ($editingProduct['description'] ?? ''),
    'price' => $editingProduct ? number_format((float) $editingProduct['price'], 2, '.', '') : '',
];

foreach ($existingImages as $image) {
    $imageSortOrder[(int) $image['id']] = (int) $image['sort_order'];
}

if (is_post()) {
    ensure_csrf_or_abort();

    $form['section_id'] = trim((string) ($_POST['section_id'] ?? ''));
    $form['name'] = trim((string) ($_POST['name'] ?? ''));
    $form['slug'] = trim((string) ($_POST['slug'] ?? ''));
    $form['attributes_text'] = trim((string) ($_POST['attributes_text'] ?? ''));
    $form['description'] = trim((string) ($_POST['description'] ?? ''));
    $form['price'] = trim((string) ($_POST['price'] ?? ''));

    $sectionIds = array_map(static fn (array $section): int => (int) $section['id'], $sections);

    if (!preg_match('/^\d+$/', $form['section_id']) || !in_array((int) $form['section_id'], $sectionIds, true)) {
        $errors[] = 'Please choose a valid section.';
    }

    if ($form['name'] === '') {
        $errors[] = 'Product name is required.';
    }

    if ($form['description'] === '') {
        $errors[] = 'Product description is required.';
    }

    if ($form['price'] === '') {
        $errors[] = 'Product price is required.';
    } elseif (!is_numeric($form['price']) || (float) $form['price'] < 0) {
        $errors[] = 'Price must be a valid positive number.';
    }

    $removeImageIds = array_map('intval', (array) ($_POST['remove_image_ids'] ?? []));
    $removeImageIds = array_values(array_intersect($removeImageIds, $existingImageIds));
    $imageSortOrder = [];

    foreach ($existingImages as $image) {
        $imageId = (int) $image['id'];

        if (in_array($imageId, $removeImageIds, true)) {
            continue;
        }

        $sortValue = trim((string) ($_POST['image_sort_order'][$imageId] ?? (string) $image['sort_order']));
        if (!preg_match('/^-?\d+$/', $sortValue)) {
            $errors[] = 'Every image sort order must be a whole number.';
            break;
        }

        $imageSortOrder[$imageId] = (int) $sortValue;
    }

    $hasNewUploads = has_uploaded_files($_FILES['images'] ?? []);
    $remainingImageCount = count($existingImages) - count($removeImageIds);

    if (!$editingProduct && !$hasNewUploads) {
        $errors[] = 'Please upload at least one image for the product.';
    }

    if ($editingProduct && $remainingImageCount <= 0 && !$hasNewUploads) {
        $errors[] = 'Keep at least one existing image or upload a new one.';
    }

    if ($errors === []) {
        try {
            $newImagePaths = store_product_images($_FILES['images'] ?? []);
            $payload = [
                'section_id' => (int) $form['section_id'],
                'name' => $form['name'],
                'slug' => $form['slug'],
                'attributes_text' => $form['attributes_text'],
                'description' => $form['description'],
                'price' => (float) $form['price'],
            ];

            if ($editingProduct) {
                update_product((int) $editingProduct['id'], $payload, $newImagePaths, $removeImageIds, $imageSortOrder);
                set_flash('success', 'Product updated successfully.');
            } else {
                create_product($payload, $newImagePaths);
                set_flash('success', 'Product created successfully.');
            }

            redirect('dashboard-products.php');
        } catch (Throwable $exception) {
            $errors[] = $exception instanceof RuntimeException
                ? $exception->getMessage()
                : 'Something went wrong while saving the product. Please try again.';
        }
    }
}

require __DIR__ . '/_admin_header.php';
?>

<main class="admin-shell">
    <div class="container admin-grid">
        <section class="page-heading">
            <span class="eyebrow"><?= $editingProduct ? 'Edit Product' : 'New Product' ?></span>
            <h1><?= $editingProduct ? 'Refine product details and gallery.' : 'Create a new catalog product.' ?></h1>
            <p>Each product stores its section, multiple images, attributes, description, and price for the customer detail page.</p>
        </section>

        <section class="form-card">
            <?php foreach ($errors as $error): ?>
                <div class="flash flash--error" style="margin-bottom:1rem;"><?= e($error) ?></div>
            <?php endforeach; ?>

            <form method="post" enctype="multipart/form-data">
                <?= csrf_input() ?>

                <div class="form-grid">
                    <div class="field">
                        <label for="section_id">Section</label>
                        <select id="section_id" name="section_id" required>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?= e((string) $section['id']) ?>" <?= (int) $form['section_id'] === (int) $section['id'] ? 'selected' : '' ?>>
                                    <?= e((string) $section['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="price">Price</label>
                        <input id="price" name="price" type="number" min="0" step="0.01" value="<?= e($form['price']) ?>" required>
                    </div>

                    <div class="field">
                        <label for="name">Product Name</label>
                        <input id="name" name="name" type="text" value="<?= e($form['name']) ?>" required>
                    </div>

                    <div class="field">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" type="text" value="<?= e($form['slug']) ?>" placeholder="Leave blank to generate automatically">
                    </div>

                    <div class="field field--full">
                        <label for="attributes_text">Attributes</label>
                        <textarea id="attributes_text" name="attributes_text" placeholder="Add one attribute per line"><?= e($form['attributes_text']) ?></textarea>
                        <div class="helper-text">Example: 250g pack, Natural leaf blend, Luxury charcoal-ready mix.</div>
                    </div>

                    <div class="field field--full">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required><?= e($form['description']) ?></textarea>
                    </div>

                    <div class="field field--full">
                        <label for="images">Product Images</label>
                        <input id="images" name="images[]" type="file" accept="image/*" multiple data-image-input>
                        <div class="helper-text">Upload JPG, PNG, WEBP, or GIF images. You can add multiple images and arrange existing ones below.</div>
                    </div>
                </div>

                <div class="preview-grid" data-image-preview></div>

                <?php if ($existingImages !== []): ?>
                    <div class="section-block">
                        <h2 style="font-size:2rem;">Existing Images</h2>
                        <p class="table-note" style="margin-top:0.5rem;">Change sort order to control the carousel sequence, or mark images to remove them on save.</p>

                        <div class="existing-images">
                            <?php foreach ($existingImages as $image): ?>
                                <?php $imageId = (int) $image['id']; ?>
                                <figure class="existing-image-card">
                                    <img src="<?= e((string) $image['image_path']) ?>" alt="<?= e((string) $form['name']) ?>">
                                    <figcaption>
                                        <div class="image-tools">
                                            <div class="field">
                                                <label for="image-sort-<?= e((string) $imageId) ?>">Sort Order</label>
                                                <input
                                                    id="image-sort-<?= e((string) $imageId) ?>"
                                                    type="number"
                                                    name="image_sort_order[<?= e((string) $imageId) ?>]"
                                                    value="<?= e((string) ($imageSortOrder[$imageId] ?? $image['sort_order'])) ?>"
                                                >
                                            </div>

                                            <label class="checkbox-row" for="remove-image-<?= e((string) $imageId) ?>">
                                                <input
                                                    id="remove-image-<?= e((string) $imageId) ?>"
                                                    type="checkbox"
                                                    name="remove_image_ids[]"
                                                    value="<?= e((string) $imageId) ?>"
                                                    <?= in_array($imageId, $removeImageIds, true) ? 'checked' : '' ?>
                                                >
                                                Remove this image
                                            </label>
                                        </div>
                                    </figcaption>
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="toolbar-actions">
                    <button class="button button-primary" type="submit"><?= $editingProduct ? 'Save Changes' : 'Create Product' ?></button>
                    <a class="button button-secondary" href="dashboard-products.php">Cancel</a>
                    <?php if ($editingProduct): ?>
                        <a class="button button-secondary" href="product.php?slug=<?= e((string) $editingProduct['slug']) ?>" target="_blank" rel="noopener">View Storefront Page</a>
                    <?php endif; ?>
                </div>
            </form>
        </section>
    </div>
</main>

<?php require __DIR__ . '/_admin_footer.php'; ?>
