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

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'];
$component->arResult['ATT_PHOTOS_COUNT'] = count($att_photos['VALUE']);

foreach ($att_photos['VALUE'] as $key => $att_photo) {
    if ($att_photo) {
        $arItemPictureFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                'width' => 500,
                'height' => 500,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                'width' => 100,
                'height' => 100,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        if ($arItemPictureFileTmp['src']) {
            $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
        }

        if ($arItemPictureLqipFileTmp['src']) {
            $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
        }

        $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS']['PICTURE'][$key] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS']['PICTURE_LQIP'][$key] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
    }
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