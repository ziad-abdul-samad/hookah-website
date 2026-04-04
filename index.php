<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

$currentPage = 'home';
$bodyPage = 'home';
$pageTitle = app_name() . ' | Luxury Tobacco & Accessories';
$sections = get_home_sections_with_products(3);
$stats = get_dashboard_stats();
$fallbackImage = 'https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200';

require __DIR__ . '/_site_header.php';
?>

<main>
    <section class="hero section">
        <div class="container hero-grid">
            <div class="hero-copy reveal">
                <span class="eyebrow" data-i18n="home.hero.eyebrow">Curated Lounge Excellence</span>
                <h1 data-i18n="home.hero.title">A refined tobacco destination shaped with gold-standard detail.</h1>
                <p class="lead" data-i18n="home.hero.text">Discover premium tobacco blends, clean-burning coal, and presentation-grade accessories arranged in a modern boutique experience for retailers, lounges, and connoisseurs.</p>

                <div class="hero-actions">
                    <a class="button button-primary" href="products.php" data-i18n="home.hero.primaryCta">Explore Products</a>
                    <a class="button button-secondary" href="about.php" data-i18n="home.hero.secondaryCta">Discover Our Story</a>
                </div>

                <div class="hero-stats">
                    <article class="stat-card">
                        <strong><?= e((string) $stats['sections']) ?></strong>
                        <span data-lang-en="Store sections" data-lang-ar="أقسام المتجر">Store sections</span>
                    </article>
                    <article class="stat-card">
                        <strong><?= e((string) $stats['products']) ?></strong>
                        <span data-lang-en="Live products" data-lang-ar="المنتجات المباشرة">Live products</span>
                    </article>
                    <article class="stat-card">
                        <strong><?= e((string) $stats['images']) ?></strong>
                        <span data-lang-en="Gallery images" data-lang-ar="صور المعرض">Gallery images</span>
                    </article>
                </div>
            </div>

            <div class="hero-visual reveal">
                <div class="hero-glow hero-glow--top"></div>
                <div class="hero-glow hero-glow--bottom"></div>

                <figure class="hero-card hero-card--large">
                    <img
                        src="https://images.pexels.com/photos/26729614/pexels-photo-26729614.jpeg?auto=compress&cs=tinysrgb&w=1400"
                        alt="Elegant premium lounge interior"
                        data-i18n-alt="home.images.heroMainAlt"
                        loading="eager"
                    >
                </figure>

                <figure class="hero-card hero-card--small hero-card--upper">
                    <img
                        src="https://images.pexels.com/photos/20122596/pexels-photo-20122596.jpeg?auto=compress&cs=tinysrgb&w=900"
                        alt="Luxury hookah product display"
                        data-i18n-alt="home.images.heroSideAlt"
                        loading="lazy"
                    >
                </figure>

                <figure class="hero-card hero-card--small hero-card--lower">
                    <img
                        src="https://images.pexels.com/photos/33698249/pexels-photo-33698249.jpeg?auto=compress&cs=tinysrgb&w=900"
                        alt="Preparing premium tobacco"
                        data-i18n-alt="home.images.heroAccentAlt"
                        loading="lazy"
                    >
                </figure>

                <aside class="floating-brief">
                    <span class="floating-label" data-i18n="home.hero.noteLabel">Signature Promise</span>
                    <p data-i18n="home.hero.noteText">Hand-selected tobacco, balanced heat control, and polished accessories that elevate every shelf and session.</p>
                </aside>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow" data-i18n="home.categories.eyebrow">Core Collections</span>
                <h2 data-i18n="home.categories.title">Designed for a premium retail presence and a memorable lounge experience.</h2>
                <p data-i18n="home.categories.text">Each category is presented with a clean, editorial layout so you can expand the catalog later without disturbing the luxury feel.</p>
            </div>

            <div class="category-grid">
                <article class="lux-card category-card reveal">
                    <div class="category-media">
                        <img
                            src="https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200"
                            alt="Premium tobacco bowl preparation"
                            data-i18n-alt="home.images.categoryOneAlt"
                            loading="lazy"
                        >
                    </div>
                    <div class="category-body">
                        <span class="icon-badge" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M12 3C8.4 7 6 10.4 6 14.2C6 18 8.7 21 12 21C15.3 21 18 18 18 14.2C18 10.4 15.6 7 12 3Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M12 7.5C10 10 9 11.9 9 13.8C9 15.8 10.3 17.3 12 17.3C13.7 17.3 15 15.8 15 13.8C15 11.9 14 10 12 7.5Z" fill="currentColor" opacity="0.24"/>
                            </svg>
                        </span>
                        <h3 data-i18n="home.categories.card1.title">Reserve Tobacco Blends</h3>
                        <p data-i18n="home.categories.card1.text">Layered aroma profiles, smooth molasses texture, and shelf-ready presentation for boutiques and lounges.</p>
                        <span class="category-meta" data-i18n="home.categories.card1.meta">Balanced flavor depth</span>
                    </div>
                </article>

                <article class="lux-card category-card reveal">
                    <div class="category-media">
                        <img
                            src="https://images.pexels.com/photos/28834322/pexels-photo-28834322.jpeg?auto=compress&cs=tinysrgb&w=1200"
                            alt="Glowing premium charcoal cubes"
                            data-i18n-alt="home.images.categoryTwoAlt"
                            loading="lazy"
                        >
                    </div>
                    <div class="category-body">
                        <span class="icon-badge" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7.5 4.5H16.5L20 8V16L16.5 19.5H7.5L4 16V8L7.5 4.5Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M9 9L12 12L15 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 12V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <h3 data-i18n="home.categories.card2.title">Natural Coconut Coal</h3>
                        <p data-i18n="home.categories.card2.text">Consistent ignition, stable temperature, and an elegant burn profile that complements high-end tobacco service.</p>
                        <span class="category-meta" data-i18n="home.categories.card2.meta">Clean and even heat</span>
                    </div>
                </article>

                <article class="lux-card category-card reveal">
                    <div class="category-media">
                        <img
                            src="https://images.pexels.com/photos/20122596/pexels-photo-20122596.jpeg?auto=compress&cs=tinysrgb&w=1200"
                            alt="Luxury smoking accessories"
                            data-i18n-alt="home.images.categoryThreeAlt"
                            loading="lazy"
                        >
                    </div>
                    <div class="category-body">
                        <span class="icon-badge" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M5 16.5L9.5 12L12.5 15L19 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 8.5H19V12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="7" cy="7" r="2.25" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                        </span>
                        <h3 data-i18n="home.categories.card3.title">Smoking Accessories</h3>
                        <p data-i18n="home.categories.card3.text">Statement hookahs, bowls, tongs, and display pieces selected to complete a polished luxury setup.</p>
                        <span class="category-meta" data-i18n="home.categories.card3.meta">Retail and lounge ready</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow"><span data-lang-en="Live Collections" data-lang-ar="الأقسام المباشرة">Live Collections</span></span>
                <h2 data-lang-en="Your dashboard sections now appear inside the original luxury storefront." data-lang-ar="أقسام لوحة التحكم تظهر الآن داخل الواجهة الفاخرة الأصلية.">Your dashboard sections now appear inside the original luxury storefront.</h2>
                <p data-lang-en="Create sections and products from the dashboard and they will show here automatically without losing the premium homepage design." data-lang-ar="أنشئ الأقسام والمنتجات من لوحة التحكم وستظهر هنا تلقائيًا دون فقدان تصميم الصفحة الرئيسية الفاخر.">Create sections and products from the dashboard and they will show here automatically without losing the premium homepage design.</p>
            </div>

            <?php if ($sections === []): ?>
                <article class="product-empty reveal is-visible">
                    <h3 data-lang-en="No live sections yet." data-lang-ar="لا توجد أقسام مباشرة بعد.">No live sections yet.</h3>
                    <p data-lang-en="Add your first section and products from the dashboard to populate this premium storefront area." data-lang-ar="أضف أول قسم ومنتجاتك من لوحة التحكم لملء هذه المساحة الفاخرة في المتجر.">Add your first section and products from the dashboard to populate this premium storefront area.</p>
                    <div class="hero-actions" style="justify-content:center;">
                        <a class="button button-primary" href="<?= e(is_admin_logged_in() ? 'dashboard.php' : 'dashboard-login.php') ?>" data-lang-en="Open Dashboard" data-lang-ar="افتح لوحة التحكم">Open Dashboard</a>
                    </div>
                </article>
            <?php else: ?>
                <div class="category-grid">
                    <?php foreach ($sections as $section): ?>
                        <?php
                        $sectionProducts = $section['products'] ?? [];
                        $coverImage = $sectionProducts[0]['cover_image'] ?? $fallbackImage;
                        $sectionDescription = trim((string) ($section['description'] ?? ''));
                        ?>
                        <article class="lux-card category-card reveal">
                            <div class="category-media">
                                <img src="<?= e((string) $coverImage) ?>" alt="<?= e((string) $section['name']) ?>" loading="lazy">
                            </div>
                            <div class="category-body">
                                <span class="category-meta">
                                    <?= e((string) $section['product_count']) ?>
                                    <span data-lang-en="Products" data-lang-ar="منتجات" style="margin-inline-start:0.35rem;">Products</span>
                                </span>
                                <h3 style="margin-top:1rem;"><?= e((string) $section['name']) ?></h3>
                                <?php if ($sectionDescription !== ''): ?>
                                    <p><?= e($sectionDescription) ?></p>
                                <?php else: ?>
                                    <p data-lang-en="A refined collection space ready for premium tobacco, coal, and accessories." data-lang-ar="مساحة عرض راقية جاهزة للتبغ الفاخر والفحم والإكسسوارات.">A refined collection space ready for premium tobacco, coal, and accessories.</p>
                                <?php endif; ?>

                                <?php if ($sectionProducts !== []): ?>
                                    <div class="feature-stack" style="margin-top:1.2rem;">
                                        <?php foreach ($sectionProducts as $product): ?>
                                            <a class="feature-card" href="product.php?slug=<?= e((string) $product['slug']) ?>">
                                                <div>
                                                    <h3 style="font-size:1.2rem;"><?= e((string) $product['name']) ?></h3>
                                                    <p style="margin-top:0.45rem;"><?= e(format_currency((float) $product['price'])) ?></p>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section section-contrast">
        <div class="container story-grid">
            <div class="story-media reveal">
                <figure class="story-figure">
                    <img
                        src="https://images.pexels.com/photos/33698249/pexels-photo-33698249.jpeg?auto=compress&cs=tinysrgb&w=1400"
                        alt="Preparing refined tobacco by hand"
                        data-i18n-alt="home.images.experienceAlt"
                        loading="lazy"
                    >
                </figure>
                <div class="story-badge" data-i18n="home.experience.badge">Every arrival is visually checked and batch reviewed.</div>
            </div>

            <div class="story-copy reveal">
                <span class="eyebrow" data-i18n="home.experience.eyebrow">Luxury By Design</span>
                <h2 data-i18n="home.experience.title">A boutique presentation system built for elegant storefronts and modern hospitality.</h2>
                <p data-i18n="home.experience.text">From product selection to visual merchandising, the experience is composed to feel calm, upscale, and intentionally premium in both Arabic and English.</p>

                <div class="feature-stack">
                    <article class="feature-card">
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M12 4L18 7V12C18 15.6 15.7 18.8 12 20C8.3 18.8 6 15.6 6 12V7L12 4Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M9.5 12L11.2 13.7L14.8 10.1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <div>
                            <h3 data-i18n="home.experience.point1.title">Trusted Quality Control</h3>
                            <p data-i18n="home.experience.point1.text">Refined display standards, tidy packaging hierarchy, and a clean brand impression at every touchpoint.</p>
                        </div>
                    </article>

                    <article class="feature-card">
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M6 17.5H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 17.5V9.5C8 7.3 9.8 5.5 12 5.5C14.2 5.5 16 7.3 16 9.5V17.5" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M10.5 9.5C10.5 8.7 11.2 8 12 8C12.8 8 13.5 8.7 13.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <div>
                            <h3 data-i18n="home.experience.point2.title">Editorial Product Styling</h3>
                            <p data-i18n="home.experience.point2.text">Images, cards, and spacing are arranged to feel premium while staying easy to edit manually later.</p>
                        </div>
                    </article>

                    <article class="feature-card">
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M4 16L8.5 11.5L12 15L20 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 7H20V10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <div>
                            <h3 data-i18n="home.experience.point3.title">Bilingual Luxury Flow</h3>
                            <p data-i18n="home.experience.point3.text">The layout flips cleanly between LTR and RTL so the Arabic version feels native, not forced.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow" data-i18n="home.showcase.eyebrow">Premium Highlights</span>
                <h2 data-i18n="home.showcase.title">Elegant details that make the whole site feel curated rather than generic.</h2>
                <p data-i18n="home.showcase.text">Subtle motion, layered surfaces, and luxury accents work together to create a polished browsing experience.</p>
            </div>

            <div class="showcase-grid">
                <article class="lux-card highlight-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 3L14.8 8.7L21 9.6L16.5 14L17.6 20.2L12 17.2L6.4 20.2L7.5 14L3 9.6L9.2 8.7L12 3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <h3 data-i18n="home.showcase.card1.title">Signature Presentation</h3>
                    <p data-i18n="home.showcase.card1.text">Golden accents, serif headlines, and restrained motion for a refined first impression.</p>
                </article>

                <article class="lux-card highlight-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 4C14.8 6.6 16.5 8.9 16.5 11.7C16.5 14.6 14.5 16.5 12 16.5C9.5 16.5 7.5 14.6 7.5 11.7C7.5 8.9 9.2 6.6 12 4Z" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M9 18.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M10.5 21H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <h3 data-i18n="home.showcase.card2.title">Smooth Animation Rhythm</h3>
                    <p data-i18n="home.showcase.card2.text">Fade-ins, hover lift, and button transitions keep the interface alive without becoming noisy.</p>
                </article>

                <article class="lux-card highlight-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <rect x="4.5" y="5.5" width="15" height="13" rx="2.5" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M8 10.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M8 14.5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <h3 data-i18n="home.showcase.card3.title">Easy Manual Expansion</h3>
                    <p data-i18n="home.showcase.card3.text">The same clean structures can be duplicated quickly when you add more products later.</p>
                </article>
            </div>

            <div class="editorial-panel reveal">
                <div class="editorial-copy">
                    <span class="eyebrow" data-i18n="home.showcase.panel.eyebrow">Curated Atmosphere</span>
                    <h2 data-i18n="home.showcase.panel.title">Built to feel like a premium showroom, not a basic catalog.</h2>
                    <p data-i18n="home.showcase.panel.text">Use the Products page as your editable inventory board, then use the Home and About pages to reinforce brand confidence with elegant storytelling.</p>
                    <a class="button button-primary" href="products.php" data-i18n="home.showcase.panel.cta">Open Product Catalog</a>
                </div>
                <figure class="editorial-media">
                    <img
                        src="https://images.pexels.com/photos/28865193/pexels-photo-28865193.jpeg?auto=compress&cs=tinysrgb&w=1400"
                        alt="Modern premium lounge"
                        data-i18n-alt="home.images.panelAlt"
                        loading="lazy"
                    >
                </figure>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container">
            <div class="cta-band reveal">
                <div>
                    <span class="eyebrow" data-i18n="home.cta.eyebrow">Ready To Expand</span>
                    <h2 data-i18n="home.cta.title">A polished static website that is simple to edit and strong enough to present immediately.</h2>
                    <p data-i18n="home.cta.text">Everything is written in plain HTML, CSS, and JavaScript, so you can open the files directly in the browser and update the content manually whenever you need.</p>
                </div>
                <div class="cta-actions">
                    <a class="button button-primary" href="products.php" data-i18n="home.cta.primary">Browse Products</a>
                    <a class="button button-secondary" href="about.php" data-i18n="home.cta.secondary">Read About Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_site_footer.php'; ?>
