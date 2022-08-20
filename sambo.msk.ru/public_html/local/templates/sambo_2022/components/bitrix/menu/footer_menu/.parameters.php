<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
    "CLASS_NAME" => [
        "NAME" => Loc::getMessage('FOOTER_MENU_CLASS_NAME'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
];