<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$this->setFrameMode(true);
$att_detail_text = $arResult["DISPLAY_PROPERTIES"]["ATT_DETAIL_TEXT"]["~VALUE"];
?>
<div class="page-articles-detail clearfix">
    <?php
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $att_detail_text,
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
    ?>
    <div class="views-counter">
        <i class="fa-solid fa-eye views-counter__icon"></i>
        <span class="views-counter__text"><?= get_views_with_declension($arResult["SHOW_COUNTER"] ?? 0); ?></span>
    </div>
</div>
