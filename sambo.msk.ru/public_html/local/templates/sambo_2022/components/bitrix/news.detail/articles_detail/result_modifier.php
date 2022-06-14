<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 * @global CMain $APPLICATION
 */

$arResult["VIEW_COUNT"] = get_views_with_declension($arResult["SHOW_COUNTER"] ?? 0);