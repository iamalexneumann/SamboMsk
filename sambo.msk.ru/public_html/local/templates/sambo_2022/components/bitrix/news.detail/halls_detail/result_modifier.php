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
use Bitrix\Main\Localization\Loc;

$component = $this->__component;

if ($arResult['DETAIL_PICTURE']) {
    $arResultPictureFileTmp = \CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        [
            'width' => 1600,
            'height' => 1200,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    if ($arResultPictureFileTmp['src']) {
        $arResultPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arResultPictureFileTmp['src'], true);
    }

    $arResult['PICTURE'] = array_change_key_case($arResultPictureFileTmp, CASE_UPPER);
}

$att_set_open = $arResult['DISPLAY_PROPERTIES']['ATT_SET_OPEN']['VALUE_XML_ID'];
$set_open_circle_count = 3;
if ($att_set_open === 'Y') {
    $arResult['SET_OPEN_TEXT'] = Loc::getMessage('HALLS_DETAIL_SET_OPEN_TEXT_OPEN');
} else {
    $arResult['SET_OPEN_TEXT'] = Loc::getMessage('HALLS_DETAIL_SET_OPEN_TEXT_CLOSED');
}

$att_phones = $arResult['DISPLAY_PROPERTIES']['ATT_PHONES'];
foreach ($att_phones['VALUE'] as $key_phone => $phone_number) {
    $arResult['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_FORMATTED'][$key_phone] = '+7 ' . substr($phone_number, 1);
    $arResult['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_TEL'][$key_phone] = clear_symbols_in_phone_number(
        substr($phone_number, 1)
    );
}

$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'];

foreach ($att_videos['VALUE'] as $key => $att_video) {
    $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS']['YOUTUBE_ID'][$key] = get_youtube_id($att_video);
}

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'];
if ($att_photos) {
    $component->arResult['ATT_PHOTOS_COUNT'] = count($att_photos['VALUE']);
}

foreach ($att_photos['VALUE'] as $key => $att_photo) {
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

$att_contacts_photos = $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_PHOTOS'];
if ($att_contacts_photos) {
    $component->arResult['ATT_CONTACTS_PHOTOS_COUNT'] = count($att_contacts_photos['VALUE']);
}

foreach ($att_contacts_photos['VALUE'] as $key => $att_contacts_photo) {
    if ($att_contacts_photo) {
        $att_contacts_photoFileTmp = \CFile::ResizeImageGet(
            $att_contacts_photo,
            [
                "width" => 300,
                "height" => 400,
            ],
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );

        $att_contacts_photoLqipFileTmp = \CFile::ResizeImageGet(
            $att_contacts_photo,
            [
                "width" => 75,
                "height" => 100,
            ],
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );

        if ($att_contacts_photoFileTmp['src']) {
            $att_contacts_photoFileTmp['src'] = \CUtil::GetAdditionalFileURL($att_contacts_photoFileTmp['src'], true);
        }

        if ($att_contacts_photoLqipFileTmp['src']) {
            $att_contacts_photoLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($att_contacts_photoLqipFileTmp['src'], true);
        }

        $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_PHOTOS']['PICTURE'][$key] = array_change_key_case($att_contacts_photoFileTmp, CASE_UPPER);
        $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_PHOTOS']['PICTURE_LQIP'][$key] = array_change_key_case($att_contacts_photoLqipFileTmp, CASE_UPPER);
    }
}

$att_contacts_video = $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_VIDEO'];
if ($att_contacts_video) {
    $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_VIDEO']['YOUTUBE_ID'] = get_youtube_id($att_contacts_video['VALUE']);
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

if ($arResult['DISPLAY_PROPERTIES']['ATT_SCHEDULE']['~VALUE']) {
    $arResult['USE_MASONRY'] = 'Y';
}

$component->SetResultCacheKeys(
    [
        'DATE_CREATE',
        'OG_PICTURE_SRC',
        'USE_MASONRY',
        'ATT_PHOTOS_COUNT',
    ],
);