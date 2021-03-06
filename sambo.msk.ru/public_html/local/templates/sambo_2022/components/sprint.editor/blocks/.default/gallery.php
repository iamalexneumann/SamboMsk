<?php
/**
 * @var $block array
 * @var $this SprintEditorBlocksComponent
 */

$images = Sprint\Editor\Blocks\Gallery::getImages(
    $block, [
    'width'  => 100,
    'height' => 100,
    'exact'  => 1,
],
    [
        'width'  => 500,
        'height' => 500,
        'exact'  => 1,
    ]
);
?>
<?php
if (!empty($images)):
    $this->registerCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
    $this->registerJs(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
?>
<figure role="group" class="photos-list">
    <div class="row photos-list__row">
        <?php foreach ($images as $image): ?>
        <div class="col-lg-4 col-6 photos-list__col">
            <figure class="photos-list__item">
                <a data-fancybox="gallery-page-list" class="photos-list__link" href="<?= $image['ORIGIN_SRC']; ?>">
                    <img alt="<?= $image['DESCRIPTION']; ?>" src="<?= $image['SRC']; ?>"  width="500" height="500"
                         class="photos-list__img blur-up lazyload" data-src="<?= $image['DETAIL_SRC']; ?>">
                    <?php if (!empty($image['DESCRIPTION'])): ?>
                    <figcaption class="photos-list__item-figcaption">
                        <?= $image['DESCRIPTION']; ?>
                    </figcaption>
                    <? endif; ?>
                </a>
            </figure>
        </div>
        <?php endforeach; ?>
    </div>
</figure>
<?php endif; ?>
