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
            <span class="eyebrow" data-admin-lang-en="<?= $editingSection ? 'Edit Section' : 'New Section' ?>" data-admin-lang-ar="<?= $editingSection ? 'تعديل قسم' : 'قسم جديد' ?>"><?= $editingSection ? 'Edit Section' : 'New Section' ?></span>
            <h1 data-admin-lang-en="<?= $editingSection ? 'Update section details.' : 'Create a new storefront section.' ?>" data-admin-lang-ar="<?= $editingSection ? 'تحديث بيانات القسم.' : 'إنشاء قسم جديد للمتجر.' ?>"><?= $editingSection ? 'Update section details.' : 'Create a new storefront section.' ?></h1>
            <p data-admin-lang-en="Sections help group products cleanly on the customer website and inside the dashboard filters." data-admin-lang-ar="تساعد الأقسام على تنظيم المنتجات بشكل واضح داخل موقع العملاء ومرشحات لوحة التحكم.">Sections help group products cleanly on the customer website and inside the dashboard filters.</p>
        </section>

        <section class="form-card">
            <?php foreach ($errors as $error): ?>
                <div class="flash flash--error" style="margin-bottom:1rem;"><?= e($error) ?></div>
            <?php endforeach; ?>

            <form method="post">
                <?= csrf_input() ?>
                <div class="form-grid">
                    <div class="field">
                        <label for="name" data-admin-lang-en="Section Name" data-admin-lang-ar="اسم القسم">Section Name</label>
                        <input id="name" name="name" type="text" value="<?= e($form['name']) ?>" required>
                    </div>

                    <div class="field">
                        <label for="slug" data-admin-lang-en="Slug" data-admin-lang-ar="الرابط المختصر">Slug</label>
                        <input id="slug" name="slug" type="text" value="<?= e($form['slug']) ?>" placeholder="Leave blank to generate automatically" data-admin-placeholder-en="Leave blank to generate automatically" data-admin-placeholder-ar="اتركه فارغًا ليتم إنشاؤه تلقائيًا">
                    </div>

                    <div class="field field--full">
                        <label for="description" data-admin-lang-en="Description" data-admin-lang-ar="الوصف">Description</label>
                        <textarea id="description" name="description"><?= e($form['description']) ?></textarea>
                    </div>

                    <div class="field">
                        <label for="sort_order" data-admin-lang-en="Sort Order" data-admin-lang-ar="ترتيب العرض">Sort Order</label>
                        <input id="sort_order" name="sort_order" type="number" value="<?= e($form['sort_order']) ?>">
                    </div>
                </div>

                <div class="toolbar-actions">
                    <button class="button button-primary" type="submit" data-admin-lang-en="<?= $editingSection ? 'Save Changes' : 'Create Section' ?>" data-admin-lang-ar="<?= $editingSection ? 'حفظ التغييرات' : 'إنشاء القسم' ?>"><?= $editingSection ? 'Save Changes' : 'Create Section' ?></button>
                    <a class="button button-secondary" href="dashboard-sections.php" data-admin-lang-en="Cancel" data-admin-lang-ar="إلغاء">Cancel</a>
                </div>
            </form>
        </section>
    </div>
</main>

<?php require __DIR__ . '/_admin_footer.php'; ?>
