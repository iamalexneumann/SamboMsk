<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

if ($arResult["ITEMS"]) {
    foreach($arResult["ITEMS"] as $key => &$arItem) {
        $arItem["PICTURE"] = [];
        $arItem["PICTURE_LQIP"] = [];
        $item_picture = $arItem["PREVIEW_PICTURE"];
        if ($item_picture) {
            $arItemPictureFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    "width" => 300,
                    "height" => 300,
                ],
                BX_RESIZE_IMAGE_EXACT,
                true
            );

            $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
                $item_picture,
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

            $arItem["PICTURE"] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
            $arItem["PICTURE_LQIP"] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
        }

        $arItem["DATETIME"] = FormatDate('Y-m-d', MakeTimeStamp($arItem["ACTIVE_FROM"]));
    }
}