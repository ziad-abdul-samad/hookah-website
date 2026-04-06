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
            <span class="eyebrow" data-admin-lang-en="Overview" data-admin-lang-ar="نظرة عامة">Overview</span>
            <h1 data-admin-lang-en="Control the storefront from one place." data-admin-lang-ar="تحكم في واجهة المتجر من مكان واحد.">Control the storefront from one place.</h1>
            <p data-admin-lang-en="Create sections, manage products, upload images, and keep the storefront updated without editing templates manually." data-admin-lang-ar="أنشئ الأقسام وأدر المنتجات وارفع الصور وحافظ على تحديث المتجر بدون تعديل القوالب يدويًا.">Create sections, manage products, upload images, and keep the storefront updated without editing templates manually.</p>
        </section>

        <section class="dashboard-stats">
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['sections']) ?></strong>
                <span class="muted" data-admin-lang-en="Sections" data-admin-lang-ar="الأقسام">Sections</span>
            </article>
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['products']) ?></strong>
                <span class="muted" data-admin-lang-en="Products" data-admin-lang-ar="المنتجات">Products</span>
            </article>
            <article class="surface dashboard-stat">
                <strong><?= e((string) $stats['images']) ?></strong>
                <span class="muted" data-admin-lang-en="Uploaded images" data-admin-lang-ar="الصور المرفوعة">Uploaded images</span>
            </article>
        </section>

        <section class="admin-overview">
            <div class="table-card">
                <div class="toolbar-actions" style="justify-content:space-between; margin-top:0;">
                    <h2 style="font-size:2rem;" data-admin-lang-en="Recent Sections" data-admin-lang-ar="أحدث الأقسام">Recent Sections</h2>
                    <a class="button button-primary button-small" href="dashboard-section-form.php" data-admin-lang-en="Add Section" data-admin-lang-ar="إضافة قسم">Add Section</a>
                </div>
                <?php if ($sections === []): ?>
                    <p class="lead" data-admin-lang-en="No sections have been created yet." data-admin-lang-ar="لم يتم إنشاء أي أقسام بعد.">No sections have been created yet.</p>
                <?php else: ?>
                    <div class="mini-grid" style="margin-top:1rem;">
                        <?php foreach ($sections as $section): ?>
                            <div class="surface">
                                <h3><?= e((string) $section['name']) ?></h3>
                                <p class="muted" style="margin-top:0.45rem;"><?= e((string) $section['description']) ?></p>
                                <div class="product-meta" style="margin-top:0.8rem;">
                                    <span class="pill"><?= e((string) $section['product_count']) ?> <span data-admin-lang-en="products" data-admin-lang-ar="منتجات">products</span></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="table-card">
                <div class="toolbar-actions" style="justify-content:space-between; margin-top:0;">
                    <h2 style="font-size:2rem;" data-admin-lang-en="Latest Products" data-admin-lang-ar="أحدث المنتجات">Latest Products</h2>
                    <a class="button button-primary button-small" href="dashboard-product-form.php" data-admin-lang-en="Add Product" data-admin-lang-ar="إضافة منتج">Add Product</a>
                </div>
                <?php if ($products === []): ?>
                    <p class="lead" data-admin-lang-en="No products have been created yet." data-admin-lang-ar="لم يتم إنشاء أي منتجات بعد.">No products have been created yet.</p>
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
