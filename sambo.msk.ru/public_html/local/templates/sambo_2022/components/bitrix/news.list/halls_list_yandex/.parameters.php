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

$arTemplateParameters = [
	"YANDEX_API_KEY" => [
		"NAME" => Loc::getMessage('HALS_LIST_YANDEX_YANDEX_API_KEY'),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	],
	"MAP_CENTER" => [
		"NAME" => Loc::getMessage('HALS_LIST_YANDEX_MAP_CENTER'),
		"TYPE" => "STRING",
		"DEFAULT" => "55.76, 37.64",
    ],
	"MAP_ZOOM" => [
		"NAME" => Loc::getMessage('HALS_LIST_YANDEX_MAP_ZOOM'),
		"TYPE" => "STRING",
		"DEFAULT" => "9",
    ],
];
