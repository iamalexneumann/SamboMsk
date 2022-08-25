<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'] ?? '';
?>
<div class="photos-detail">
    <?php if($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
    <div class="mb-5">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
        ?>
    </div>
    <?php endif; ?>

    <?php if ($arResult['ATT_PHOTOS_COUNT'] > 0): ?>
    <figure role="group" class="photos-list">
        <div class="row photos-list__row">
            <?php
            foreach ($att_photos['VALUE'] as $key => $att_photo):
                $att_photo_description = $att_photos['DESCRIPTION'][$key] ?? '';
            ?>
            <div class="col-lg-4 col-6 photos-list__col">
                <figure class="photos-list__item">
                    <a href="<?= $att_photos['FILE_VALUE'][$key]['SRC'] ?: $att_photos['FILE_VALUE']['SRC']; ?>"
                       data-fancybox="photos-list" class="photos-list__link"
                        <?php if ($att_photo_description): ?>
                            title="<?= $att_photo_description; ?>"
                            data-caption="<?= $att_photo_description; ?>"
                        <?php endif; ?>>
                        <img src="<?= $att_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                             data-src="<?= $att_photos['PICTURE'][$key]['SRC']; ?>"
                             alt="<?= $att_photo_description; ?>"
                             class="photos-list__img lazyload blur-up"
                             width="<?= $att_photos['PICTURE'][$key]['WIDTH']; ?>"
                             height="<?= $att_photos['PICTURE'][$key]['HEIGHT']; ?>">
                    </a>
                    <?php if ($att_photo_description): ?>
                    <figcaption class="photos-list__item-figcaption"><?= $att_photo_description; ?></figcaption>
                    <?php endif; ?>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
        <figcaption class="photos-list__main-figcaption"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('PHOTOS_DETAIL_MAIN_FIGCAPTION_TEXT'); ?></figcaption>
    </figure>
    <?php endif; ?>
</div>