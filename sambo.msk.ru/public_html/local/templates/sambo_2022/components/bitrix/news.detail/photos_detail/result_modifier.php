<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$att_photos = $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"];

foreach($att_photos['VALUE'] as $key => $att_photo) {
    $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"]["PICTURE"][$key] = [];
    $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"]["PICTURE_LQIP"][$key] = [];
    if ($att_photo) {
        $arItemPictureFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                "width" => 500,
                "height" => 500,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                "width" => 100,
                "height" => 100,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        if ($arItemPictureFileTmp["src"]) {
            $arItemPictureFileTmp["src"] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp["src"], true);
        }

        if ($arItemPictureLqipFileTmp["src"]) {
            $arItemPictureLqipFileTmp["src"] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp["src"], true);
        }

        $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"]["PICTURE"][$key] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"]["PICTURE_LQIP"][$key] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
    }
}