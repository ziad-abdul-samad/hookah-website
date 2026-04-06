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
                    <span class="eyebrow" data-i18n="about.hero.eyebrow">About Mood</span>
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
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow" data-lang-en="Contact Details" data-lang-ar="بيانات التواصل">Contact Details</span>
                <h2 data-lang-en="Reach Mood through our customer service channels." data-lang-ar="تواصل مع مود عبر قنوات خدمة العملاء.">Reach Mood through our customer service channels.</h2>
                <p data-lang-en="Clear contact information presented in the same polished visual style as the rest of the brand experience." data-lang-ar="معلومات تواصل واضحة ومقدمة بنفس الأسلوب البصري الأنيق المعتمد في تجربة العلامة.">Clear contact information presented in the same polished visual style as the rest of the brand experience.</p>
            </div>

            <div class="info-grid info-grid--contact">
                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M7 5H10L11.5 8.5L9.5 10.2C10.4 12 12 13.6 13.8 14.5L15.5 12.5L19 14V17C19 17.6 18.6 18 18 18C11.9 18 7 13.1 7 7C7 6.4 7.4 6 8 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <h3 data-lang-en="Customer Service" data-lang-ar="خدمة العملاء">Customer Service</h3>
                    <p>0940001900</p>
                </article>

                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 7.5L12 13L20 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="4" y="6" width="16" height="12" rx="2.5" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </span>
                    <h3 data-lang-en="Email" data-lang-ar="البريد الإلكتروني">Email</h3>
                    <p>İnfo@moodtobacco.com.sy</p>
                </article>

                <article class="lux-card info-card reveal">
                    <span class="icon-badge" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 20C15.5 16.8 18 13.9 18 10.8C18 7.6 15.3 5 12 5C8.7 5 6 7.6 6 10.8C6 13.9 8.5 16.8 12 20Z" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="12" cy="10.5" r="2.2" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </span>
                    <h3 data-lang-en="Address" data-lang-ar="العنوان">Address</h3>
                    <p data-lang-en="Homs, industrial area (حمص المنطقة الصناعية)" data-lang-ar="حمص، المنطقة الصناعية">Homs, industrial area (حمص المنطقة الصناعية)</p>
                </article>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_site_footer.php'; ?>
