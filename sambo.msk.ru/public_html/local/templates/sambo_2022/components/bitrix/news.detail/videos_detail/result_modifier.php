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

$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'];

foreach ($att_videos['VALUE'] as $key => $att_video) {
    $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS']['YOUTUBE_ID'][$key] = get_youtube_id($att_video);
}

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
        'OG_PICTURE_SRC',
        'ATT_PHOTOS_COUNT',
    ],
);