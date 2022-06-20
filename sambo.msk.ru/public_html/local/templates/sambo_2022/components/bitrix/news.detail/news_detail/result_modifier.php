<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$arResult["VIEW_COUNT"] = get_views_with_declension($arResult["SHOW_COUNTER"] ?? 0);
$arResult["TELEGRAM_DISCUSSION"] = get_telegram_discussion($arResult["DISPLAY_PROPERTIES"]["ATT_RELATED_TELEGRAM_POST"]["VALUE"] ?? '');