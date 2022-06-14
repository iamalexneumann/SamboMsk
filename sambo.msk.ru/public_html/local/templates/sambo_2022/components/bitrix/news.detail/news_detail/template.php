<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$this->setFrameMode(true);
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent $component
 */
?>
<div class="page-news-detail clearfix">
    <?php
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $arResult["DISPLAY_PROPERTIES"]["ATT_DETAIL_TEXT"]["~VALUE"],
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    ); ?>
</div>
<?php if ($arResult["VIEW_COUNT"]): ?>
<div class="views-counter">
    <i class="fa-solid fa-eye views-counter__icon"></i>
    <span class="views-counter__text"><?= $arResult["VIEW_COUNT"]; ?></span>
</div>
<?php endif; ?>