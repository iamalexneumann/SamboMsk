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

$param_tag_title = $arParams['TAG_TITLE'] ?? '2';
$param_show_cta_form = $arParams['SHOW_CTA_FORM'] ?? 'N';
$param_cta_from_position = (int)$arParams['CTA_FORM_POSITION'] ?? 3;
?>
<div class="articles-list<?php if ($arParams['TAG_LIST']): ?> <?= $arParams['TAG_LIST']; ?>-list<?php endif; ?>">
    <?php
    foreach ($arResult['ITEMS'] as $key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
        if ($key === $param_cta_from_position && $param_show_cta_form === 'Y') {
            require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_inner_form.php');
        }
    ?>
    <article class="article <?php if ($arParams['TAG_LIST']): ?> <?= $arParams['TAG_LIST']; ?>-article<?php endif; ?>"
             id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="article__img-link" rel="nofollow">
            <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                 data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                 class="article__img lazyload blur-up"
                 alt="<?= $arItem['NAME']; ?>"
                 width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                 height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
        </a>
        <div class="article__wrapper">
            <header class="article__header">
                <?php if($arParams['DISPLAY_DATE'] !== "N" && $arItem['DISPLAY_ACTIVE_FROM']): ?>
                <time class="article__time" datetime="<?= $arItem['DATETIME']; ?>"><?= $arItem['DISPLAY_ACTIVE_FROM']; ?> <?= Loc::getMessage('ARTICLES_LIST_DATETIME_TEXT'); ?></time>
                <?php endif; ?>
                <h<?= $param_tag_title; ?> class="article__title">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="article__link"><?= $arItem['NAME']; ?></a>
                </h<?= $param_tag_title; ?>>
            </header>
            <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE']): ?>
            <div class="article__preview-text">
                <?php
                $APPLICATION->IncludeComponent(
                    "sprint.editor:blocks",
                    ".default",
                    Array(
                        "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE'],
                    ),
                    $component,
                    Array(
                        "HIDE_ICONS" => "Y"
                    )
                );
                ?>
            </div>
            <?php endif; ?>
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="btn btn-primary article__btn" rel="nofollow">
                <?= Loc::getMessage('ARTICLES_LIST_MORE_BTN_TEXT'); ?> <i class="fa-solid fa-angle-right article__btn-icon"></i>
            </a>
        </div>
    </article>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
} ?>