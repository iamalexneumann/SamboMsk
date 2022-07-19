<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$arResult["VIEW_COUNT"] = get_views_with_declension($arResult["SHOW_COUNTER"] ?? 0);
$arResult["TELEGRAM_DISCUSSION"] = get_telegram_discussion($arResult["DISPLAY_PROPERTIES"]["ATT_RELATED_TELEGRAM_POST"]["VALUE"] ?? '');
$ogPictureFileTmp = \CFile::ResizeImageGet(
    $arResult["DETAIL_PICTURE"],
    [
        "width" => 968,
        "height" => 504,
    ],
    BX_RESIZE_IMAGE_EXACT,
    true
);
create_og_img(
    $_SERVER['DOCUMENT_ROOT'] . $ogPictureFileTmp['src'],
    htmlspecialchars_decode($arResult["NAME"]),
    get_img_name_from_cur_dir($APPLICATION->GetCurDir())
);
$this->SetViewTarget('siteparamArticlePublishedTime');
?><meta property="article:published_time" content="<?= FormatDate("Y-m-dТH:i:s+03:00", strtotime($arResult["ACTIVE_FROM"])); ?>"><?php
$this->EndViewTarget();
