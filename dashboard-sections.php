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
            <span class="eyebrow">Sections</span>
            <h1>CRUD every storefront section.</h1>
            <p>Sections control how products are organized on the customer website. Deleting a section also removes its related products and images.</p>
        </section>

        <section class="table-card">
            <div class="admin-toolbar">
                <form class="filters" method="get" action="dashboard-sections.php" style="flex:1;">
                    <div class="filter-group">
                        <label for="q">Search sections</label>
                        <input id="q" type="search" name="q" value="<?= e($search) ?>" placeholder="Search by section name or description">
                    </div>
                    <div class="toolbar-actions">
                        <button class="button button-primary button-small" type="submit">Search</button>
                        <a class="button button-secondary button-small" href="dashboard-sections.php">Reset</a>
                    </div>
                </form>

                <a class="button button-primary" href="dashboard-section-form.php">Add Section</a>
            </div>

            <?php if ($sections === []): ?>
                <div class="empty-state">
                    <h2>No sections found.</h2>
                    <p class="muted">Create a section or change the search criteria.</p>
                </div>
            <?php else: ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Sort</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section): ?>
                            <tr>
                                <td>
                                    <span class="table-label">Name</span>
                                    <strong><?= e((string) $section['name']) ?></strong>
                                    <div class="muted"><?= e((string) $section['description']) ?></div>
                                </td>
                                <td>
                                    <span class="table-label">Slug</span>
                                    <?= e((string) $section['slug']) ?>
                                </td>
                                <td>
                                    <span class="table-label">Products</span>
                                    <?= e((string) $section['product_count']) ?>
                                </td>
                                <td>
                                    <span class="table-label">Sort</span>
                                    <?= e((string) $section['sort_order']) ?>
                                </td>
                                <td>
                                    <span class="table-label">Actions</span>
                                    <div class="actions-inline">
                                        <a class="button button-secondary button-small" href="dashboard-section-form.php?id=<?= e((string) $section['id']) ?>">Edit</a>
                                        <form class="inline-form" method="post" action="dashboard-section-delete.php" onsubmit="return confirm('Delete this section and all its products?');">
                                            <?= csrf_input() ?>
                                            <input type="hidden" name="id" value="<?= e((string) $section['id']) ?>">
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
