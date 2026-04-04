<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

if (!is_post()) {
    redirect('dashboard-sections.php');
}

ensure_csrf_or_abort();

$sectionId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$sectionId) {
    set_flash('error', 'Section id is invalid.');
    redirect('dashboard-sections.php');
}

try {
    delete_section((int) $sectionId);
    set_flash('success', 'Section and related products deleted successfully.');
} catch (Throwable $exception) {
    set_flash('error', 'The section could not be deleted right now. Please try again.');
}

redirect('dashboard-sections.php');
