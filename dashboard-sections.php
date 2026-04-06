<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

$currentPage = 'sections';
$pageTitle = app_name() . ' | Manage Sections';
$search = request_query_string('q');
$sections = get_sections($search !== '' ? $search : null);

require __DIR__ . '/_admin_header.php';
?>

<main class="admin-shell">
    <div class="container admin-grid">
        <section class="page-heading">
            <span class="eyebrow" data-admin-lang-en="Sections" data-admin-lang-ar="الأقسام">Sections</span>
            <h1 data-admin-lang-en="Manage every storefront section." data-admin-lang-ar="إدارة جميع أقسام المتجر.">Manage every storefront section.</h1>
            <p data-admin-lang-en="Sections control how products are organized on the customer website. Deleting a section also removes its related products and images." data-admin-lang-ar="تتحكم الأقسام في طريقة تنظيم المنتجات داخل موقع العملاء. حذف القسم يؤدي أيضًا إلى حذف المنتجات والصور المرتبطة به.">Sections control how products are organized on the customer website. Deleting a section also removes its related products and images.</p>
        </section>

        <section class="table-card">
            <div class="admin-toolbar">
                <form class="filters" method="get" action="dashboard-sections.php" style="flex:1;">
                    <div class="filter-group">
                        <label for="q" data-admin-lang-en="Search sections" data-admin-lang-ar="البحث في الأقسام">Search sections</label>
                        <input id="q" type="search" name="q" value="<?= e($search) ?>" placeholder="Search by section name or description" data-admin-placeholder-en="Search by section name or description" data-admin-placeholder-ar="ابحث باسم القسم أو وصفه">
                    </div>
                    <div class="toolbar-actions">
                        <button class="button button-primary button-small" type="submit" data-admin-lang-en="Search" data-admin-lang-ar="بحث">Search</button>
                        <a class="button button-secondary button-small" href="dashboard-sections.php" data-admin-lang-en="Reset" data-admin-lang-ar="إعادة ضبط">Reset</a>
                    </div>
                </form>

                <a class="button button-primary" href="dashboard-section-form.php" data-admin-lang-en="Add Section" data-admin-lang-ar="إضافة قسم">Add Section</a>
            </div>

            <?php if ($sections === []): ?>
                <div class="empty-state">
                    <h2 data-admin-lang-en="No sections found." data-admin-lang-ar="لم يتم العثور على أقسام.">No sections found.</h2>
                    <p class="muted" data-admin-lang-en="Create a section or change the search criteria." data-admin-lang-ar="أنشئ قسمًا جديدًا أو غيّر معايير البحث.">Create a section or change the search criteria.</p>
                </div>
            <?php else: ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th data-admin-lang-en="Name" data-admin-lang-ar="الاسم">Name</th>
                            <th data-admin-lang-en="Slug" data-admin-lang-ar="الرابط المختصر">Slug</th>
                            <th data-admin-lang-en="Products" data-admin-lang-ar="المنتجات">Products</th>
                            <th data-admin-lang-en="Sort" data-admin-lang-ar="الترتيب">Sort</th>
                            <th data-admin-lang-en="Actions" data-admin-lang-ar="الإجراءات">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section): ?>
                            <tr>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Name" data-admin-lang-ar="الاسم">Name</span>
                                    <strong><?= e((string) $section['name']) ?></strong>
                                    <div class="muted"><?= e((string) $section['description']) ?></div>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Slug" data-admin-lang-ar="الرابط المختصر">Slug</span>
                                    <?= e((string) $section['slug']) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Products" data-admin-lang-ar="المنتجات">Products</span>
                                    <?= e((string) $section['product_count']) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Sort" data-admin-lang-ar="الترتيب">Sort</span>
                                    <?= e((string) $section['sort_order']) ?>
                                </td>
                                <td>
                                    <span class="table-label" data-admin-lang-en="Actions" data-admin-lang-ar="الإجراءات">Actions</span>
                                    <div class="actions-inline">
                                        <a class="button button-secondary button-small" href="dashboard-section-form.php?id=<?= e((string) $section['id']) ?>" data-admin-lang-en="Edit" data-admin-lang-ar="تعديل">Edit</a>
                                        <form class="inline-form" method="post" action="dashboard-section-delete.php" onsubmit="return confirm('Delete this section and all its products?');">
                                            <?= csrf_input() ?>
                                            <input type="hidden" name="id" value="<?= e((string) $section['id']) ?>">
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
