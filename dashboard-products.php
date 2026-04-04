<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

$currentPage = 'products';
$pageTitle = app_name() . ' | Manage Products';
$search = request_query_string('q');
$sectionId = request_query_int('section');
$sections = get_sections();
$products = get_products([
    'search' => $search,
    'section_id' => $sectionId,
]);
$placeholderImage = 'https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200';

require __DIR__ . '/_admin_header.php';
?>

<main class="admin-shell">
    <div class="container admin-grid">
        <section class="page-heading">
            <span class="eyebrow">Products</span>
            <h1>Manage every product, image, and price.</h1>
            <p>Search by product details, filter by section, edit galleries, and keep storefront information synchronized from one admin table.</p>
        </section>

        <section class="table-card">
            <div class="admin-toolbar">
                <form class="filters" method="get" action="dashboard-products.php" style="flex:1;">
                    <div class="filter-group">
                        <label for="q">Search products</label>
                        <input id="q" type="search" name="q" value="<?= e($search) ?>" placeholder="Search by product name, section, attributes, or description">
                    </div>

                    <div class="filter-group">
                        <label for="section">Section</label>
                        <select id="section" name="section">
                            <option value="">All sections</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?= e((string) $section['id']) ?>" <?= $sectionId === (int) $section['id'] ? 'selected' : '' ?>>
                                    <?= e((string) $section['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="toolbar-actions">
                        <button class="button button-primary button-small" type="submit">Search</button>
                        <a class="button button-secondary button-small" href="dashboard-products.php">Reset</a>
                    </div>
                </form>

                <a class="button button-primary" href="dashboard-product-form.php">Add Product</a>
            </div>

            <?php if ($products === []): ?>
                <div class="empty-state">
                    <h2>No products found.</h2>
                    <p class="muted">Add a product or change the search and section filters.</p>
                </div>
            <?php else: ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Section</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="table-label">Product</span>
                                    <div class="table-product">
                                        <img
                                            class="table-thumb"
                                            src="<?= e((string) ($product['cover_image'] ?: $placeholderImage)) ?>"
                                            alt="<?= e((string) $product['name']) ?>"
                                        >
                                        <div class="table-copy">
                                            <strong><?= e((string) $product['name']) ?></strong>
                                            <div class="muted"><?= e(excerpt((string) ($product['description'] ?: $product['attributes_text']), 100)) ?></div>
                                            <div class="product-meta">
                                                <span class="pill">Slug: <?= e((string) $product['slug']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="table-label">Section</span>
                                    <?= e((string) $product['section_name']) ?>
                                </td>
                                <td>
                                    <span class="table-label">Price</span>
                                    <?= e(format_currency((float) $product['price'])) ?>
                                </td>
                                <td>
                                    <span class="table-label">Images</span>
                                    <?= e((string) $product['image_count']) ?>
                                </td>
                                <td>
                                    <span class="table-label">Updated</span>
                                    <?= e(date('M j, Y', strtotime((string) $product['updated_at']))) ?>
                                </td>
                                <td>
                                    <span class="table-label">Actions</span>
                                    <div class="actions-inline">
                                        <a class="button button-secondary button-small" href="product.php?slug=<?= e((string) $product['slug']) ?>" target="_blank" rel="noopener">View</a>
                                        <a class="button button-secondary button-small" href="dashboard-product-form.php?id=<?= e((string) $product['id']) ?>">Edit</a>
                                        <form class="inline-form" method="post" action="dashboard-product-delete.php" onsubmit="return confirm('Delete this product and all of its images?');">
                                            <?= csrf_input() ?>
                                            <input type="hidden" name="id" value="<?= e((string) $product['id']) ?>">
                                            <button class="button button-danger button-small" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require __DIR__ . '/_admin_footer.php'; ?>
