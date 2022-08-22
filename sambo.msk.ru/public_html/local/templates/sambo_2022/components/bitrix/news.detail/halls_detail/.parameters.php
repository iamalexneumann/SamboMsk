<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
	"YANDEX_API_KEY" => [
		"NAME" => Loc::getMessage('HALLS_DETAIL_YANDEX_API_KEY'),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	],
];