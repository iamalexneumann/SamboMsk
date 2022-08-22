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
            'width' => 660,
            'height' => 1000,
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
        true
    );

    $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        [
            'width' => 100,
            'height' => 63,
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
        true
    );

    if ($arResultPictureFileTmp['src']) {
        $arResultPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arResultPictureFileTmp['src'], true);
    }

    if ($arItemPictureLqipFileTmp['src']) {
        $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
    }

    $arResult['PICTURE'] = array_change_key_case($arResultPictureFileTmp, CASE_UPPER);
    $arResult['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
}

$arResult['AGE'] = get_age(
    FormatDate('Y', strtotime($arResult['DISPLAY_PROPERTIES']['ATT_BIRTHDAY']['VALUE'])),
    Loc::getMessage('COACH_DETAIL_AGE_DECLENSION_ONE'),
    Loc::getMessage('COACH_DETAIL_AGE_DECLENSION_FOUR'),
    Loc::getMessage('COACH_DETAIL_AGE_DECLENSION_FIVE')
);

$arResult['BIRHTDAY_FORMATTED'] = FormatDate('d F Y', strtotime($arResult['DISPLAY_PROPERTIES']['ATT_BIRTHDAY']['VALUE']));

$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'];

foreach ($att_videos['VALUE'] as $key => $att_video) {
    $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS']['YOUTUBE_ID'][$key] = get_youtube_id($att_video);
}

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'];

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
    ],
);