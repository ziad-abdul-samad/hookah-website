<?php
declare(strict_types=1);

$pageTitle = $pageTitle ?? app_name();
$currentPage = $currentPage ?? '';
$bodyPage = $bodyPage ?? '';
$flash = pull_flash();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <script src="app.js" defer></script>
    <script src="storefront-bridge.js" defer></script>
</head>
<body data-page="<?= e($bodyPage) ?>">
    <header class="site-header">
        <div class="container header-shell">
            <a class="brand" href="index.php" aria-label="<?= e(app_name()) ?>">
                <span class="brand-mark"><img src="images/logo2.png" alt="<?= e(app_name()) ?> logo"></span>
                <span class="brand-copy">
                    <span class="brand-name"><?= e(app_name()) ?></span>
                    <span class="brand-tagline" data-i18n="nav.brandTagline">Fine Tobacco Atelier</span>
                </span>
            </a>

            <button
                class="nav-toggle"
                type="button"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="site-navigation-panel"
                aria-label="Open menu"
                data-i18n-aria-label="nav.menuLabel"
            >
                <span class="sr-only" data-i18n="nav.menuLabel">Open menu</span>
                <span class="nav-toggle__bars" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <div class="nav-panel" id="site-navigation-panel" data-nav-panel>
                <nav class="site-nav" aria-label="Primary">
                    <a class="nav-link <?= nav_is_active($currentPage, 'home') ?>" href="index.php" <?= $currentPage === 'home' ? 'aria-current="page"' : '' ?> data-i18n="nav.home">Home</a>
                    <a class="nav-link <?= nav_is_active($currentPage, 'products') ?>" href="products.php" <?= $currentPage === 'products' ? 'aria-current="page"' : '' ?> data-i18n="nav.products">Products</a>
                    <a class="nav-link <?= nav_is_active($currentPage, 'about') ?>" href="about.php" <?= $currentPage === 'about' ? 'aria-current="page"' : '' ?> data-i18n="nav.about">About Us</a>
                </nav>

                <div class="header-actions">
                    <div class="lang-switcher" aria-label="Language switcher">
                        <button class="lang-option" type="button" data-lang-option="en">EN</button>
                        <button class="lang-option" type="button" data-lang-option="ar">AR</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="nav-backdrop" type="button" data-nav-backdrop tabindex="-1" aria-hidden="true"></button>
    </header>

    <?php if ($flash): ?>
        <div class="container flash-wrap">
            <div class="flash flash--<?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        </div>
    <?php endif; ?>
