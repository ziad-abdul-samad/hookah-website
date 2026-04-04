<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

$currentPage = 'sections';
$sectionId = request_query_int('id');
$editingSection = $sectionId ? get_section_by_id($sectionId) : null;

if ($sectionId && !$editingSection) {
    abort(404, 'Section not found.');
}

$pageTitle = app_name() . ($editingSection ? ' | Edit Section' : ' | Add Section');
$errors = [];
$form = [
    'name' => (string) ($editingSection['name'] ?? ''),
    'slug' => (string) ($editingSection['slug'] ?? ''),
    'description' => (string) ($editingSection['description'] ?? ''),
    'sort_order' => (string) ($editingSection['sort_order'] ?? '0'),
];

if (is_post()) {
    ensure_csrf_or_abort();

    $form['name'] = trim((string) ($_POST['name'] ?? ''));
    $form['slug'] = trim((string) ($_POST['slug'] ?? ''));
    $form['description'] = trim((string) ($_POST['description'] ?? ''));
    $form['sort_order'] = trim((string) ($_POST['sort_order'] ?? '0'));

    if ($form['name'] === '') {
        $errors[] = 'Section name is required.';
    }

    if (!preg_match('/^-?\d+$/', $form['sort_order'])) {
        $errors[] = 'Sort order must be a whole number.';
    }

    if ($errors === []) {
        try {
            $payload = [
                'name' => $form['name'],
                'slug' => $form['slug'],
                'description' => $form['description'],
                'sort_order' => (int) $form['sort_order'],
            ];

            if ($editingSection) {
                update_section((int) $editingSection['id'], $payload);
                set_flash('success', 'Section updated successfully.');
            } else {
                create_section($payload);
                set_flash('success', 'Section created successfully.');
            }

            redirect('dashboard-sections.php');
        } catch (Throwable $exception) {
            $errors[] = 'Something went wrong while saving the section. Please try again.';
        }
    }
}

require __DIR__ . '/_admin_header.php';
?>

<main class="admin-shell">
    <div class="container admin-grid">
        <section class="page-heading">
            <span class="eyebrow"><?= $editingSection ? 'Edit Section' : 'New Section' ?></span>
            <h1><?= $editingSection ? 'Update section details.' : 'Create a new storefront section.' ?></h1>
            <p>Sections help group products cleanly on the customer website and inside the dashboard filters.</p>
        </section>

        <section class="form-card">
            <?php foreach ($errors as $error): ?>
                <div class="flash flash--error" style="margin-bottom:1rem;"><?= e($error) ?></div>
            <?php endforeach; ?>

            <form method="post">
                <?= csrf_input() ?>
                <div class="form-grid">
                    <div class="field">
                        <label for="name">Section Name</label>
                        <input id="name" name="name" type="text" value="<?= e($form['name']) ?>" required>
                    </div>

                    <div class="field">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" type="text" value="<?= e($form['slug']) ?>" placeholder="Leave blank to generate automatically">
                    </div>

                    <div class="field field--full">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"><?= e($form['description']) ?></textarea>
                    </div>

                    <div class="field">
                        <label for="sort_order">Sort Order</label>
                        <input id="sort_order" name="sort_order" type="number" value="<?= e($form['sort_order']) ?>">
                    </div>
                </div>

                <div class="toolbar-actions">
                    <button class="button button-primary" type="submit"><?= $editingSection ? 'Save Changes' : 'Create Section' ?></button>
                    <a class="button button-secondary" href="dashboard-sections.php">Cancel</a>
                </div>
            </form>
        </section>
    </div>
</main>

<?php require __DIR__ . '/_admin_footer.php'; ?>
