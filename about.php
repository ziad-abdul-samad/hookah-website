<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

$currentPage = 'about';
$bodyPage = 'about';
$pageTitle = app_name() . ' | About Us';

require __DIR__ . '/_site_header.php';
?>

<main>
    <section class="page-hero section section--tight">
        <div class="container">
            <div class="page-hero__shell reveal">
                <div class="page-hero__copy">
                    <span class="eyebrow" data-i18n="about.hero.eyebrow">About Aurum Leaf</span>
                    <h1 data-i18n="about.hero.title">A polished brand story presented with elegant structure and visual confidence.</h1>
                    <p class="lead lead--compact" data-i18n="about.hero.text">This page is designed to explain your company clearly, showcase your standards, and support both English and Arabic audiences with a premium bilingual layout.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--compact">
        <div class="container">
            <div class="map-banner reveal">
                <div class="map-banner__content">
                    <span class="eyebrow" data-i18n="about.banner.eyebrow">Regional Reach</span>
                    <h2 data-i18n="about.banner.title">A luxury distribution story with craftsmanship at the center.</h2>
                    <p data-i18n="about.banner.text">The wide map-style banner gives this page a distinguished opening while suggesting sourcing networks, hospitality supply, and elevated brand movement.</p>
                </div>

                <span class="map-tag map-tag--one" data-i18n="about.banner.tag1">Damascus Atelier</span>
                <span class="map-tag map-tag--two" data-i18n="about.banner.tag2">Premium Retail Partners</span>
                <span class="map-tag map-tag--three" data-i18n="about.banner.tag3">Hospitality Supply Route</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="info-grid">
                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 3L18 6.5V12.5C18 16.1 15.7 19 12 20.4C8.3 19 6 16.1 6 12.5V6.5L12 3Z" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M9.5 11.8L11.2 13.5L14.7 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <h3 data-i18n="about.cards.card1.title">Heritage Quality</h3>
                    <p data-i18n="about.cards.card1.text">We position the brand as careful, detail-driven, and selective about every product introduced to the shelf.</p>
                </article>

                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M6 18H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M8 18V10L12 6L16 10V18" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M10.5 13H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <h3 data-i18n="about.cards.card2.title">Elegant Store Presence</h3>
                    <p data-i18n="about.cards.card2.text">Our presentation standard is built for premium counters, curated displays, and a visually balanced customer experience.</p>
                </article>

                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 5V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="12" cy="12" r="7.5" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </span>
                    <h3 data-i18n="about.cards.card3.title">Regional Distribution</h3>
                    <p data-i18n="about.cards.card3.text">The structure suggests organized supply routes for tobacco, coal, and accessories across multiple client channels.</p>
                </article>

                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M6 15.5C6 12.7 8.2 10.5 11 10.5H13C15.8 10.5 18 12.7 18 15.5V18H6V15.5Z" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="9.5" cy="7.5" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="14.5" cy="7.5" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </span>
                    <h3 data-i18n="about.cards.card4.title">Client Partnership</h3>
                    <p data-i18n="about.cards.card4.text">The tone supports long-term retail and hospitality relationships built around consistency, presentation, and trust.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section section-contrast">
        <div class="container about-story">
            <div class="about-copy reveal">
                <span class="eyebrow" data-i18n="about.story.eyebrow">Brand Character</span>
                <h2 data-i18n="about.story.title">Structured storytelling that feels premium in both languages.</h2>
                <p data-i18n="about.story.text">The About page is arranged to feel calm, valuable, and trustworthy. It balances visual sophistication with clear information so the brand feels established from the first screen.</p>

                <div class="story-points">
                    <div class="story-point">
                        <span class="story-point__marker"></span>
                        <p data-i18n="about.story.point1">Use this section to describe sourcing philosophy, product discipline, or market vision.</p>
                    </div>
                    <div class="story-point">
                        <span class="story-point__marker"></span>
                        <p data-i18n="about.story.point2">Swap in real company details later without changing the page structure or styling system.</p>
                    </div>
                    <div class="story-point">
                        <span class="story-point__marker"></span>
                        <p data-i18n="about.story.point3">RTL and LTR support are already handled, so both language versions stay elegant and readable.</p>
                    </div>
                </div>
            </div>

            <div class="about-visual reveal">
                <figure class="about-figure">
                    <img
                        src="https://images.pexels.com/photos/28865193/pexels-photo-28865193.jpeg?auto=compress&cs=tinysrgb&w=1400"
                        alt="Premium lounge environment"
                        data-i18n-alt="about.images.storyAlt"
                        loading="lazy"
                    >
                </figure>
                <div class="quote-card" data-i18n="about.story.quote">Refined presentation builds confidence before the first product is even touched.</div>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_site_footer.php'; ?>
