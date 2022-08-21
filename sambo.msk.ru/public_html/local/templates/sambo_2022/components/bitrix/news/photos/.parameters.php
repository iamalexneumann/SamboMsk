<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
    "TAG_TITLE" => [
        "NAME" => Loc::getMessage('PHOTOS_TAG_TITLE'),
        "TYPE" => "LIST",
        "VALUES" => [
            "2" => "<h2>",
            "3" => "<h3>",
            "4" => "<h4>",
            "5" => "<h5>",
            "6" => "<h6>"
        ],
        "DEFAULT" => "2",
    ],
    "TAG_LIST" => [
        "NAME" => Loc::getMessage('PHOTOS_TAG_LIST'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
    "SHOW_CTA_FORM" => [
        "NAME" => Loc::getMessage('PHOTOS_SHOW_CTA_FORM'),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ],
    "CTA_FORM_POSITION" => [
        "NAME" => Loc::getMessage('PHOTOS_CTA_FORM_POSITION'),
        "TYPE" => "LIST",
        "VALUES" => [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
        ],
        "DEFAULT" => "2",
    ],
];