<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

$currentPage = 'dashboard';
$pageTitle = app_name() . ' | Dashboard Overview';
$stats = get_dashboard_stats();
$sections = array_slice(get_sections(), 0, 4);
$products = get_products(['limit' => 5]);

require __DIR__ . '/_admin_header.php';
?>

<main class="admin-shell">
    <div class="container admin-grid">
        <section class="page-heading">
            <span class="eyebrow">Overview</span>
            <h1>Control the storefront from one place.</h1>
            <p>Create sections, manage products, upload images, and keep the storefront updated without editing templates manually.</p>
        </section>

        <section class="dashboard-stats">
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['sections']) ?></strong>
                <span class="muted">Sections</span>
            </article>
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['products']) ?></strong>
                <span class="muted">Products</span>
            </article>
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['images']) ?></strong>
                <span class="muted">Uploaded images</span>
            </article>
        </section>

        <section class="admin-overview">
            <div class="table-card">
                <div class="toolbar-actions" style="justify-content:space-between; margin-top:0;">
                    <h2 style="font-size:2rem;">Recent Sections</h2>
                    <a class="button button-primary button-small" href="dashboard-section-form.php">Add Section</a>
                </div>
                <?php if ($sections === []): ?>
                    <p class="lead">No sections have been created yet.</p>
                <?php else: ?>
                    <div class="mini-grid" style="margin-top:1rem;">
                        <?php foreach ($sections as $section): ?>
                            <div class="surface">
                                <h3><?= e((string) $section['name']) ?></h3>
                                <p class="muted" style="margin-top:0.45rem;"><?= e((string) $section['description']) ?></p>
                                <div class="product-meta" style="margin-top:0.8rem;">
                                    <span class="pill"><?= e((string) $section['product_count']) ?> products</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="table-card">
                <div class="toolbar-actions" style="justify-content:space-between; margin-top:0;">
                    <h2 style="font-size:2rem;">Latest Products</h2>
                    <a class="button button-primary button-small" href="dashboard-product-form.php">Add Product</a>
                </div>
                <?php if ($products === []): ?>
                    <p class="lead">No products have been created yet.</p>
                <?php else: ?>
                    <div class="mini-grid" style="margin-top:1rem;">
                        <?php foreach ($products as $product): ?>
                            <div class="surface">
                                <h3><?= e((string) $product['name']) ?></h3>
                                <p class="muted" style="margin-top:0.35rem;"><?= e((string) $product['section_name']) ?></p>
                                <div class="product-meta" style="margin-top:0.8rem;">
                                    <span class="pill"><?= e(format_currency((float) $product['price'])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php require __DIR__ . '/_admin_footer.php'; ?>
