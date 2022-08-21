<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
    "TAG_TITLE" => [
        "NAME" => Loc::getMessage('VIDEOS_TAG_TITLE'),
        "TYPE" => "LIST",
        "VALUES" => [
            "2" => "<h2>",
            "3" => "<h3>",
            "4" => "<h4>",
            "5" => "<h5>",
            "6" => "<h6>"
        ],
        "DEFAULT" => "1",
    ],
    "TAG_LIST" => [
        "NAME" => Loc::getMessage('VIDEOS_TAG_LIST'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
];