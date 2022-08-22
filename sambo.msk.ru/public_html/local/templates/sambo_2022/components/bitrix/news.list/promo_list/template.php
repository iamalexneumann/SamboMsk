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
?>

<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="alert alert-primary promo-alert fade show" id="header-promo-list" role="alert">
    <div class="container">
        <ul class="promo-list carousel slide clearfix" id="promoCarousel" data-bs-interval="false">
            <?php
            foreach ($arResult['ITEMS'] as $key => $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
                    [
                        "CONFIRM" => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
                    ]
                );
            ?>
            <li class="promo-list__item carousel-item<?php if ($key === 0): ?> active<?php endif; ?>"
                id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="promo-list__content">
                <?= $arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['DISPLAY_VALUE']; ?>
                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_BTN_LINK']['DISPLAY_VALUE']): ?>
                    <a href="<?= $arItem['DISPLAY_PROPERTIES']['ATT_BTN_LINK']['DISPLAY_VALUE']; ?>"
                       class="btn btn-sm btn-outline-light promo-list__btn">
                        <?= $arItem['DISPLAY_PROPERTIES']['ATT_BTN_TEXT']['VALUE'] ?: Loc::getMessage('PROMO_LIST_BTN_TEXT'); ?>
                    </a>
                <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($arResult['ITEMS']) > 1): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev"
                title="<?= Loc::getMessage('PROMO_LIST_CAROUSEL_PREV_BTN_TEXT'); ?>">
            <i class="fa-solid fa-chevron-left"></i>
            <span class="visually-hidden"><?= Loc::getMessage('PROMO_LIST_CAROUSEL_PREV_BTN_TEXT'); ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next"
                title="<?= Loc::getMessage('PROMO_LIST_CAROUSEL_NEXT_BTN_TEXT'); ?>">
            <i class="fa-solid fa-chevron-right"></i>
            <span class="visually-hidden"><?= Loc::getMessage('PROMO_LIST_CAROUSEL_NEXT_BTN_TEXT'); ?></span>
        </button>
        <?php endif; ?>
        <button type="button" class="btn-close btn-close_light" data-bs-dismiss="alert" aria-label="<?= Loc::getMessage("PROMO_LIST_BTN_CLOSE_LABEL"); ?>">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>
<?php endif; ?>
