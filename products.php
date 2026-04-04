<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

$currentPage = 'products';
$bodyPage = 'products';
$pageTitle = app_name() . ' | Products';
$search = request_query_string('q');
$sectionId = request_query_int('section');
$sections = get_sections();
$products = get_products([
    'search' => $search,
    'section_id' => $sectionId,
]);
$placeholderImage = 'https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200';

require __DIR__ . '/_site_header.php';
?>

<main>
    <section class="page-hero section section--tight">
        <div class="container">
            <div class="page-hero__shell reveal">
                <div class="page-hero__copy">
                    <span class="eyebrow" data-lang-en="Refined Inventory" data-lang-ar="مخزون راقٍ">Refined Inventory</span>
                    <h1 data-lang-en="Search and browse the live MySQL product catalog inside the original luxury storefront." data-lang-ar="ابحث وتصفح كتالوج المنتجات المباشر من MySQL داخل الواجهة الفاخرة الأصلية.">Search and browse the live MySQL product catalog inside the original luxury storefront.</h1>
                    <p class="lead lead--compact" data-lang-en="This page keeps the premium visual identity while using your dashboard data for sections, prices, descriptions, and product galleries." data-lang-ar="تحافظ هذه الصفحة على الهوية البصرية الفاخرة مع استخدام بيانات لوحة التحكم للأقسام والأسعار والوصف ومعارض الصور.">This page keeps the premium visual identity while using your dashboard data for sections, prices, descriptions, and product galleries.</p>
                </div>
                <div class="page-ribbons">
                    <span class="ribbon-chip" data-lang-en="Search enabled" data-lang-ar="بحث مفعل">Search enabled</span>
                    <span class="ribbon-chip" data-lang-en="Dashboard connected" data-lang-ar="متصل بلوحة التحكم">Dashboard connected</span>
                    <span class="ribbon-chip" data-lang-en="Live catalog" data-lang-ar="كتالوج مباشر">Live catalog</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--compact">
        <div class="container">
            <form class="filter-shell reveal" method="get" action="products.php">
                <div class="filter-grid">
                    <div class="filter-control filter-control--search">
                        <label for="product-search" data-lang-en="Search products" data-lang-ar="ابحث في المنتجات">Search products</label>
                        <input
                            id="product-search"
                            type="search"
                            name="q"
                            value="<?= e($search) ?>"
                            placeholder="Search by name or description"
                            data-placeholder-en="Search by name, description, or attributes"
                            data-placeholder-ar="ابحث بالاسم أو الوصف أو الخصائص"
                        >
                    </div>

                    <div class="filter-control">
                        <label for="section-filter" data-lang-en="Filter by section" data-lang-ar="التصفية حسب القسم">Filter by section</label>
                        <select id="section-filter" name="section">
                            <option value="" data-lang-en="All sections" data-lang-ar="كل الأقسام">All sections</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?= e((string) $section['id']) ?>" <?= $sectionId === (int) $section['id'] ? 'selected' : '' ?>>
                                    <?= e((string) $section['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-control">
                        <label for="filter-submit" data-lang-en="Apply filters" data-lang-ar="تطبيق الفلاتر">Apply filters</label>
                        <div class="cta-actions" style="margin-top:0;">
                            <button class="button button-primary" id="filter-submit" type="submit" data-lang-en="Apply Filters" data-lang-ar="تطبيق الفلاتر">Apply Filters</button>
                            <a class="button button-secondary" href="products.php" data-lang-en="Reset" data-lang-ar="إعادة الضبط">Reset</a>
                        </div>
                    </div>
                </div>

                <div class="results-meta">
                    <strong class="results-count">
                        <?= e((string) count($products)) ?>
                        <span data-lang-en="Products" data-lang-ar="منتجات">Products</span>
                    </strong>
                    <p data-lang-en="The cards below are connected to the dashboard, so editing products in PHP/MySQL updates this page automatically." data-lang-ar="البطاقات بالأسفل متصلة بلوحة التحكم، لذلك تعديل المنتجات في PHP وMySQL يحدّث هذه الصفحة تلقائيًا.">The cards below are connected to the dashboard, so editing products in PHP/MySQL updates this page automatically.</p>
                </div>
            </form>

            <?php if ($products === []): ?>
                <article class="product-empty reveal is-visible" style="margin-top:1.5rem;">
                    <h3 data-lang-en="No products match the current filters." data-lang-ar="لا توجد منتجات تطابق الفلاتر الحالية.">No products match the current filters.</h3>
                    <p data-lang-en="Try changing the search term or selecting a different section." data-lang-ar="جرّب تغيير عبارة البحث أو اختيار قسم مختلف.">Try changing the search term or selecting a different section.</p>
                </article>
            <?php else: ?>
                <div class="product-grid">
                    <?php foreach ($products as $index => $product): ?>
                        <a class="product-card product-link reveal" style="--delay:<?= e((string) ($index * 0.08)) ?>s;" href="product.php?slug=<?= e((string) $product['slug']) ?>">
                            <figure class="product-media">
                                <img src="<?= e((string) ($product['cover_image'] ?: $placeholderImage)) ?>" alt="<?= e((string) $product['name']) ?>" loading="lazy">
                                <span class="product-type-badge"><?= e((string) $product['section_name']) ?></span>
                            </figure>
                            <div class="product-body">
                                <h3><?= e((string) $product['name']) ?></h3>
                                <p><?= e(excerpt((string) $product['description'], 120)) ?></p>
                                <div class="product-meta">
                                    <span>
                                        <span data-lang-en="Price" data-lang-ar="السعر">Price</span>:
                                        <?= e(format_currency((float) $product['price'])) ?>
                                    </span>
                                    <span>
                                        <span data-lang-en="Images" data-lang-ar="الصور">Images</span>:
                                        <?= e((string) $product['image_count']) ?>
                                    </span>
                                </div>
                                <span class="product-link__footer" data-lang-en="View Details" data-lang-ar="عرض التفاصيل">View Details</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_site_footer.php'; ?>
