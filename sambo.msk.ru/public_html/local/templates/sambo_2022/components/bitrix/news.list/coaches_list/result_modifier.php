<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
use Bitrix\Main\Localization\Loc;

if ($arResult['ITEMS']) {
    foreach($arResult['ITEMS'] as $key => &$arItem) {
        $item_picture = $arItem['PREVIEW_PICTURE'];
        if ($item_picture) {
            $arItemPictureFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    'width' => 450,
                    'height' => 675,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                true
            );

            $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    'width' => 67,
                    'height' => 100,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
                true
            );

            if ($arItemPictureFileTmp['src']) {
                $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
            }

            if ($arItemPictureLqipFileTmp['src']) {
                $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
            }

            $arItem['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
            $arItem['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
        }

        $arItem['AGE'] = get_age(
            FormatDate('Y', strtotime($arItem['DISPLAY_PROPERTIES']['ATT_BIRTHDAY']['VALUE'])),
            Loc::getMessage('COACHES_LIST_AGE_DECLENSION_ONE'),
            Loc::getMessage('COACHES_LIST_AGE_DECLENSION_FOUR'),
            Loc::getMessage('COACHES_LIST_AGE_DECLENSION_FIVE')
        );

        $att_achievments = $arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE'];
        if ($att_achievments) {
            $att_achievments_count = 3;
            $att_achievments_decoded = json_decode($att_achievments);
            $att_achievments_decoded_count = count($att_achievments_decoded->blocks[0]->elements);
            if ($att_achievments_decoded_count > $att_achievments_count) {
                for ($i = $att_achievments_count; $i < $att_achievments_decoded_count; $i++) {
                    unset($att_achievments_decoded->blocks[0]->elements[$i]);
                }
            }
            $arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE'] = json_encode($att_achievments_decoded);
        }
    }
}