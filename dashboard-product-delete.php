<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';
require_admin();

if (!is_post()) {
    redirect('dashboard-products.php');
}

ensure_csrf_or_abort();

$productId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$productId) {
    set_flash('error', 'Product id is invalid.');
    redirect('dashboard-products.php');
}

try {
    delete_product((int) $productId);
    set_flash('success', 'Product deleted successfully.');
} catch (Throwable $exception) {
    set_flash('error', 'The product could not be deleted right now. Please try again.');
}

redirect('dashboard-products.php');
