<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$att_videos = $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"];

foreach($att_videos['VALUE'] as $key => $att_video) {
    $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"]["YOUTUBE_ID"][$key] = get_youtube_id($att_video);
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