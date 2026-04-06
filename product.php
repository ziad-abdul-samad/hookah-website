<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

$slug = request_query_string('slug');
$product = $slug !== '' ? get_product_by_slug($slug) : null;

if (!$product) {
    abort(404, 'The requested product could not be found.');
}

$currentPage = 'products';
$bodyPage = '';
$pageTitle = app_name() . ' | ' . $product['name'];
$attributes = parse_attributes((string) ($product['attributes_text'] ?? ''));
$images = $product['images'] ?: [];
$coverImage = $images[0]['image_path'] ?? 'https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200';

require __DIR__ . '/_site_header.php';
?>

<main>
    <section class="page-hero section section--tight">
        <div class="container">
            <div class="page-hero__shell reveal">
                <div class="page-hero__copy">
                    <span class="eyebrow" data-lang-en="Product Details" data-lang-ar="تفاصيل المنتج">Product Details</span>
                    <h1 data-lang-en="A premium product page with gallery images, clear pricing, and elegant detail presentation." data-lang-ar="صفحة منتج فاخرة مع معرض صور وتسعير واضح وعرض أنيق للتفاصيل.">A premium product page with gallery images, clear pricing, and elegant detail presentation.</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--compact">
        <div class="container">
            <div class="product-detail-shell">
                <section class="detail-gallery reveal" data-gallery>
                    <figure class="detail-stage">
                        <img src="<?= e((string) $coverImage) ?>" alt="<?= e((string) $product['name']) ?>" data-gallery-main loading="eager">
                        <div class="detail-gallery__actions">
                            <?php if (count($images) > 1): ?>
                                <div class="detail-controls">
                                    <button class="detail-control" type="button" data-gallery-prev aria-label="Previous image" data-i18n-aria-label="detail.previousLabel">&#8249;</button>
                                    <button class="detail-control" type="button" data-gallery-next aria-label="Next image" data-i18n-aria-label="detail.nextLabel">&#8250;</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </figure>

                    <?php if (count($images) > 1): ?>
                        <div class="detail-thumbnails">
                            <?php foreach ($images as $index => $image): ?>
                                <button
                                    class="detail-thumbnail <?= $index === 0 ? 'is-active' : '' ?>"
                                    type="button"
                                    data-gallery-thumb
                                    data-image-src="<?= e((string) $image['image_path']) ?>"
                                    data-image-alt="<?= e((string) $product['name']) ?>"
                                    aria-label="<?= e((string) $product['name']) ?> <?= e((string) ($index + 1)) ?>"
                                >
                                    <img src="<?= e((string) $image['image_path']) ?>" alt="<?= e((string) $product['name']) ?> <?= e((string) ($index + 1)) ?>" loading="lazy">
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </section>

                <section class="detail-copy reveal">
                    <div class="detail-topbar">
                        <a class="detail-back" href="products.php" data-lang-en="Back to Products" data-lang-ar="العودة إلى المنتجات">Back to Products</a>
                        <span class="detail-category"><?= e((string) $product['section_name']) ?></span>
                    </div>

                    <h2><?= e((string) $product['name']) ?></h2>
                    <p class="detail-subtitle">
                        <span data-lang-en="Price" data-lang-ar="السعر">Price</span>:
                        <?= e(format_currency((float) $product['price'])) ?>
                    </p>
                    <p class="detail-description"><?= nl2br(e((string) $product['description'])) ?></p>

                    <div class="detail-meta">
                        <span>
                            <span data-lang-en="Section" data-lang-ar="القسم">Section</span>:
                            <?= e((string) $product['section_name']) ?>
                        </span>
                    </div>

                    <article class="detail-block">
                        <h3 data-lang-en="Product Overview" data-lang-ar="نظرة عامة على المنتج">Product Overview</h3>
                        <p><?= nl2br(e((string) $product['description'])) ?></p>
                    </article>

                    <article class="detail-block">
                        <h3 data-lang-en="Attributes" data-lang-ar="الخصائص">Attributes</h3>
                        <?php if ($attributes === []): ?>
                            <p data-lang-en="No attributes were added for this product yet." data-lang-ar="لم تتم إضافة خصائص لهذا المنتج بعد.">No attributes were added for this product yet.</p>
                        <?php else: ?>
                            <ul class="detail-highlights">
                                <?php foreach ($attributes as $attribute): ?>
                                    <li><?= e($attribute) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                </section>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/_site_footer.php'; ?>
