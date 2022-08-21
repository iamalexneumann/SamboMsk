<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent $component
 * @var CMain $APPLICATION
 */
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
$param_list_tag = $arParams["TAG_LIST"] ?? '';
$param_show_cta_form = $arParams["SHOW_CTA_FORM"] ?? 'N';
$param_cta_from_position = (int)$arParams["CTA_FORM_POSITION"] ?? 3;
?>
<div class="articles-list<?php if ($param_list_tag): ?> <?= $param_list_tag; ?>-list<?php endif; ?>">
    <?php
    foreach($arResult["ITEMS"] as $key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        if ($key === $param_cta_from_position && $param_show_cta_form === 'Y') {
            require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_inner_form.php');
        }
    ?>
    <article class="article <?php if ($param_list_tag): ?> <?= $param_list_tag; ?>-article<?php endif; ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="article__img-link" rel="nofollow">
            <img src="<?= $arItem["PICTURE_LQIP"]["SRC"]; ?>"
                 data-src="<?= $arItem["PICTURE"]["SRC"]; ?>"
                 class="article__img lazyload blur-up"
                 alt="<?= $arItem["NAME"]; ?>"
                 width="<?= $arItem["PICTURE"]["WIDTH"]; ?>"
                 height="<?= $arItem["PICTURE"]["HEIGHT"]; ?>">
        </a>
        <div class="article__wrapper">
            <header class="article__header">
                <?php if($arParams["DISPLAY_DATE"] !== "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                <time class="article__time" datetime="<?= $arItem["DATETIME"]; ?>"><?= $arItem["DISPLAY_ACTIVE_FROM"]; ?> г.</time>
                <?php endif; ?>
                <h<?= $param_tag_title; ?> class="article__title">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="article__link"><?= $arItem["NAME"]; ?></a>
                </h<?= $param_tag_title; ?>>
            </header>
            <?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_PREVIEW_TEXT"]["~VALUE"]): ?>
            <div class="article__preview-text">
                <?php
                $APPLICATION->IncludeComponent(
                    "sprint.editor:blocks",
                    ".default",
                    Array(
                        "JSON" => $arItem["DISPLAY_PROPERTIES"]["ATT_PREVIEW_TEXT"]["~VALUE"],
                    ),
                    $component,
                    Array(
                        "HIDE_ICONS" => "Y"
                    )
                );
                ?>
            </div>
            <?php endif; ?>
            <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="btn btn-primary article__btn" rel="nofollow">
                <?= GetMessage("btn_text"); ?> <i class="fa-solid fa-angle-right article__btn-icon"></i>
            </a>
        </div>
    </article>
    <?php endforeach; ?>
</div>
<?php
if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
    echo $arResult["NAV_STRING"];
}
?>
