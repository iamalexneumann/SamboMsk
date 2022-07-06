<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$section_title = $arResult["SECTION"]["PATH"][0]["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] ?? $arResult["NAME"];
$GLOBALS['APPLICATION']->SetTitle($section_title);