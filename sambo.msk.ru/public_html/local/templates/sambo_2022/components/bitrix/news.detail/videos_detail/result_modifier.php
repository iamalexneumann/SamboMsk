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