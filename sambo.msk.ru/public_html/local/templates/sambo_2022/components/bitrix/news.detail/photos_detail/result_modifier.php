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
$arResult["TELEGRAM_DISCUSSION"] = get_telegram_discussion($arResult["DISPLAY_PROPERTIES"]["ATT_RELATED_TELEGRAM_POST"]["VALUE"] ?? '');
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
