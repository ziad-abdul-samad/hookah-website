<?php
declare(strict_types=1);
?>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <a class="brand brand--footer" href="index.php" aria-label="<?= e(app_name()) ?>">
                    <span class="brand-mark">AL</span>
                    <span class="brand-copy">
                        <span class="brand-name"><?= e(app_name()) ?></span>
                        <span class="brand-tagline" data-i18n="nav.brandTagline">Fine Tobacco Atelier</span>
                    </span>
                </a>
                <p class="footer-text" data-i18n="footer.description">A bilingual luxury storefront for refined tobacco, natural coal, and premium smoking accessories.</p>
            </div>

            <div>
                <h2 class="footer-title" data-i18n="footer.linksTitle">Quick Links</h2>
                <div class="footer-links">
                    <a href="index.php" data-i18n="nav.home">Home</a>
                    <a href="products.php" data-i18n="nav.products">Products</a>
                    <a href="about.php" data-i18n="nav.about">About Us</a>
                    <a href="<?= e(is_admin_logged_in() ? 'dashboard.php' : 'dashboard-login.php') ?>" data-lang-en="Dashboard" data-lang-ar="لوحة التحكم">Dashboard</a>
                </div>
            </div>

            <div>
                <h2 class="footer-title" data-i18n="footer.promiseTitle">Premium Promise</h2>
                <p class="footer-text" data-i18n="footer.promiseText">Light backgrounds, black and gold accents, rich imagery, and bilingual polish combine to create a modern luxury identity.</p>
            </div>
        </div>

        <div class="container footer-bottom">
            <p class="footer-copy" data-footer-copy></p>
        </div>
    </footer>
</body>
</html>
