<?php
declare(strict_types=1);

$pageTitle = $pageTitle ?? app_name() . ' Dashboard';
$currentPage = $currentPage ?? '';
$flash = pull_flash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
    <script src="app.js" defer></script>
</head>
<body class="dashboard-body">
    <header class="site-header">
        <div class="container nav-shell">
            <a class="brand" href="dashboard.php" aria-label="<?= e(app_name()) ?> dashboard">
                <span class="brand-mark">AL</span>
                <span class="brand-copy">
                    <span class="brand-name"><?= e(app_name()) ?></span>
                    <span class="brand-tagline">Admin Dashboard</span>
                </span>
            </a>

            <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="admin-nav-panel">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-panel" id="admin-nav-panel" data-nav-panel>
                <nav class="site-nav" aria-label="Dashboard">
                    <a class="nav-link <?= nav_is_active($currentPage, 'dashboard') ?>" href="dashboard.php">Overview</a>
                    <a class="nav-link <?= nav_is_active($currentPage, 'sections') ?>" href="dashboard-sections.php">Sections</a>
                    <a class="nav-link <?= nav_is_active($currentPage, 'products') ?>" href="dashboard-products.php">Products</a>
                    <a class="nav-link" href="index.php">Storefront</a>
                </nav>

                <div class="admin-userbar">
                    <span class="admin-userchip"><?= e(admin_user() ?? 'admin') ?></span>
                    <a class="button button-primary button-small" href="dashboard-logout.php">Logout</a>
                </div>
            </div>
        </div>
        <button class="nav-overlay" type="button" data-nav-overlay tabindex="-1" aria-hidden="true"></button>
    </header>

    <?php if ($flash): ?>
        <div class="container flash-wrap">
            <div class="flash flash--<?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        </div>
    <?php endif; ?>
