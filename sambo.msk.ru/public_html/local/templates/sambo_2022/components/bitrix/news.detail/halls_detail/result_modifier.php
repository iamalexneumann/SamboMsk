<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$arResult["PICTURE"] = [];
$item_picture = $arResult["DETAIL_PICTURE"];
if ($item_picture) {
    $arResultPictureFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            "width" => 1600,
            "height" => 1200,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    if ($arResultPictureFileTmp["src"]) {
        $arResultPictureFileTmp["src"] = \CUtil::GetAdditionalFileURL($arResultPictureFileTmp["src"], true);
    }

    $arResult["PICTURE"] = array_change_key_case($arResultPictureFileTmp, CASE_UPPER);
}

$att_set_open = $arResult["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"];
$set_open_circle_count = 3;
$arResult["SET_OPEN_TEXT"] = '';
if ($att_set_open === 'Да') {
    $arResult["SET_OPEN_TEXT"] = GetMessage("set_open_text_open");
} else {
    $arResult["SET_OPEN_TEXT"] = GetMessage("set_open_text_closed");
}

$att_phones = $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"];
foreach ($att_phones["VALUE"] as $key_phone => $phone_number) {
    $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_FORMATTED"][$key_phone] = '+7 ' . substr($phone_number, 1);
    $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_TEL"][$key_phone] = clear_symbols_in_phone_number(
        substr($phone_number, 1)
    );
}

$att_videos = $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"];

foreach($att_videos['VALUE'] as $key => $att_video) {
    $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"]["YOUTUBE_ID"][$key] = get_youtube_id($att_video);
}

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