<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
$att_photos = $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"] ?? '';
?>
<div class="photos-detail">
    <?php if($arResult["DETAIL_TEXT"] <> ''): ?>
    <div class="photos-detail__text">
        <?= $arResult["DETAIL_TEXT"]; ?>
    </div>
    <?php endif; ?>
    <?php
    if (count($att_photos) > 0):
        $this->addExternalCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
        $this->addExternalJS(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
        ?>
        <figure role="group" class="photos-list">
            <div class="row photos-list__row">
            <?php
            foreach($att_photos['VALUE'] as $arItemKey => $att_photo):
                $att_photo_width = 500;
                $att_photo_height = 500;
                $att_photo = CFile::ResizeImageGet(
                    $att_photo,
                    [
                        'width' => $att_photo_width,
                        'height' => $att_photo_height
                    ],
                    BX_RESIZE_IMAGE_EXACT
                );
                $att_photo_description = $att_photos['DESCRIPTION'][$arItemKey] ?? '';
                $att_photo_src = $att_photos['FILE_VALUE'][$arItemKey]['SRC'];
                ?>
                <div class="col-lg-4 col-6 photos-list__col">
                    <figure class="photos-list__item">
                        <a href="<?= $att_photo_src; ?>" data-fancybox="photos-list" class="photos-list__link"
                            <?php if ($att_photo_description): ?>
                                title="<?= $att_photo_description; ?>"
                                data-caption="<?= $att_photo_description; ?>"
                            <?php endif; ?>>
                            <img src="<?= $att_photo['src']; ?>" alt="<?= $att_photo_description; ?>" class="photos-list__img"
                                 width="<?= $att_photo_width; ?>" height="<?= $att_photo_height; ?>">
                        </a>
                        <?php if ($att_photo_description): ?>
                        <figcaption class="photos-list__item-figcaption"><?= $att_photo_description; ?></figcaption>
                        <?php endif; ?>
                    </figure>
                </div>
            <?php endforeach; ?>
            </div>
            <figcaption class="photos-list__main-figcaption"><?= $arResult["NAME"] . ' - ' . GetMessage("MAIN_FIGCAPTION_TEXT"); ?></figcaption>
        </figure>
    <?php endif; ?>
</div>