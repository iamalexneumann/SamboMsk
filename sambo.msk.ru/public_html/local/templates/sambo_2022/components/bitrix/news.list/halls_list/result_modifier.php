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
                    "width" => 635,
                    "height" => 400,
                ],
                BX_RESIZE_IMAGE_EXACT,
                true
            );

            $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    "width" => 100,
                    "height" => 63,
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

        $att_set_open = $arItem["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"];
        $set_open_circle_count = 3;
        $arItem["SET_OPEN_ICONS"] = '';
        $arItem["SET_OPEN_TEXT"] = '';
        for ($i = 1; $i <= $set_open_circle_count; $i++) {
            if (($i === $set_open_circle_count) && ($att_set_open === 'Да')) {
                $arItem["SET_OPEN_ICONS"] .= '<i class="set-open__icon fa-solid fa-circle-half-stroke"></i>';
            } else {
                $arItem["SET_OPEN_ICONS"] .= '<i class="set-open__icon fa-solid fa-circle"></i>';
            }
        }
        if ($att_set_open === 'Да') {
            $arItem["SET_OPEN_TEXT"] = GetMessage("set_open_text_open");
        } else {
            $arItem["SET_OPEN_TEXT"] = GetMessage("set_open_text_closed");
        }

        $att_phones = $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"];

        foreach ($att_phones["VALUE"] as $key_phone => $phone_number) {
            $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_FORMATTED"][$key_phone] = '+7 ' . substr($phone_number, 1);
            $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_TEL"][$key_phone] = clear_symbols_in_phone_number(
                substr($phone_number, 1)
            );
        }
    }
}