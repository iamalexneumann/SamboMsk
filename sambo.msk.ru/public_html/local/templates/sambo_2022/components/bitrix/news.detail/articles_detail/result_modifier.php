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
 * @var CBitrixComponentTemplate $this
 */
$component = $this->__component;

$arResult['VIEW_COUNT'] = get_views_with_declension($arResult['SHOW_COUNTER'] ?? 0);
$arResult['TELEGRAM_DISCUSSION'] = get_telegram_discussion($arResult['DISPLAY_PROPERTIES']['ATT_RELATED_TELEGRAM_POST']['VALUE'] ?? '');

$ogPictureFileTmp = \CFile::ResizeImageGet(
    $arResult['DETAIL_PICTURE'],
    [
        'width' => 968,
        'height' => 504,
    ],
    BX_RESIZE_IMAGE_EXACT,
    true
);
$arResult['OG_PICTURE_SRC'] = $ogPictureFileTmp['src'];

$component->SetResultCacheKeys(
    [
        'DATE_CREATE',
        'VIEW_COUNT',
        'TELEGRAM_DISCUSSION',
        'OG_PICTURE_SRC',
    ],
);