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
            <span class="eyebrow" data-admin-lang-en="Products" data-admin-lang-ar="المنتجات">Products</span>
            <h1 data-admin-lang-en="Manage every product, image, and price." data-admin-lang-ar="إدارة جميع المنتجات والصور والأسعار.">Manage every product, image, and price.</h1>
            <p data-admin-lang-en="Search by product details, filter by section, edit galleries, and keep storefront information synchronized from one admin table." data-admin-lang-ar="ابحث عبر تفاصيل المنتج وصفِّ حسب القسم وعدّل المعرض وحافظ على مزامنة بيانات المتجر من جدول إدارة واحد.">Search by product details, filter by section, edit galleries, and keep storefront information synchronized from one admin table.</p>
        </section>

        <section class="table-card">
            <div class="admin-toolbar">
                <form class="filters" method="get" action="dashboard-products.php" style="flex:1;">
                    <div class="filter-group">
                        <label for="q" data-admin-lang-en="Search products" data-admin-lang-ar="البحث في المنتجات">Search products</label>
                        <input id="q" type="search" name="q" value="<?= e($search) ?>" placeholder="Search by product name, section, attributes, or description" data-admin-placeholder-en="Search by product name, section, attributes, or description" data-admin-placeholder-ar="ابحث باسم المنتج أو القسم أو الخصائص أو الوصف">
                    </div>

                    <div class="filter-group">
                        <label for="section" data-admin-lang-en="Section" data-admin-lang-ar="القسم">Section</label>
                        <select id="section" name="section">
                            <option value="" data-admin-lang-en="All sections" data-admin-lang-ar="كل الأقسام">All sections</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?= e((string) $section['id']) ?>" <?= $sectionId === (int) $section['id'] ? 'selected' : '' ?>>
                                    <?= e((string) $section['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="toolbar-actions">
                        <button class="button button-primary button-small" type="submit" data-admin-lang-en="Search" data-admin-lang-ar="بحث">Search</button>
                        <a class="button button-secondary button-small" href="dashboard-products.php" data-admin-lang-en="Reset" data-admin-lang-ar="إعادة ضبط">Reset</a>
                    </div>
                </form>

                <a class="button button-primary" href="dashboard-product-form.php" data-admin-lang-en="Add Product" data-admin-lang-ar="إضافة منتج">Add Product</a>
            </div>

            <?php if ($products === []): ?>
                <div class="empty-state">
                    <h2 data-admin-lang-en="No products found." data-admin-lang-ar="لم يتم العثور على منتجات.">No products found.</h2>
                    <p class="muted" data-admin-lang-en="Add a product or change the search and section filters." data-admin-lang-ar="أضف منتجًا أو غيّر البحث ومرشح القسم.">Add a product or change the search and section filters.</p>
                </div>
            <?php else: ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th data-admin-lang-en="Product" data-admin-lang-ar="المنتج">Product</th>
                            <th data-admin-lang-en="Section" data-admin-lang-ar="القسم">Section</th>
                            <th data-admin-lang-en="Price" data-admin-lang-ar="السعر">Price</th>
                            <th data-admin-lang-en="Images" data-admin-lang-ar="الصور">Images</th>
                            <th data-admin-lang-en="Updated" data-admin-lang-ar="آخر تحديث">Updated</th>
                            <th data-admin-lang-en="Actions" data-admin-lang-ar="الإجراءات">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Product" data-admin-lang-ar="المنتج">Product</span>
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
                                                <span class="pill"><span data-admin-lang-en="Slug:" data-admin-lang-ar="الرابط المختصر:">Slug:</span> <?= e((string) $product['slug']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Section" data-admin-lang-ar="القسم">Section</span>
                                    <?= e((string) $product['section_name']) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Price" data-admin-lang-ar="السعر">Price</span>
                                    <?= e(format_currency((float) $product['price'])) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Images" data-admin-lang-ar="الصور">Images</span>
                                    <?= e((string) $product['image_count']) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Updated" data-admin-lang-ar="آخر تحديث">Updated</span>
                                    <?= e(date('M j, Y', strtotime((string) $product['updated_at']))) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Actions" data-admin-lang-ar="الإجراءات">Actions</span>
                                    <div class="actions-inline">
                                        <a class="button button-secondary button-small" href="product.php?slug=<?= e((string) $product['slug']) ?>" target="_blank" rel="noopener" data-admin-lang-en="View" data-admin-lang-ar="عرض">View</a>
                                        <a class="button button-secondary button-small" href="dashboard-product-form.php?id=<?= e((string) $product['id']) ?>" data-admin-lang-en="Edit" data-admin-lang-ar="تعديل">Edit</a>
                                        <form class="inline-form" method="post" action="dashboard-product-delete.php" onsubmit="return confirm('Delete this product and all of its images?');">
                                            <?= csrf_input() ?>
                                            <input type="hidden" name="id" value="<?= e((string) $product['id']) ?>">
                                            <button class="button button-danger button-small" type="submit" data-admin-lang-en="Delete" data-admin-lang-ar="حذف">Delete</button>
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
