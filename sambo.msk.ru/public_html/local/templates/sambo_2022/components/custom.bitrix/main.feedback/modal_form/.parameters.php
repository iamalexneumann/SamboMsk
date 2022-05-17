<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$arTemplateParameters = array(
    "HALLS_URL" => Array(
        "NAME" => GetMessage("MAIN_FEEDBACK_HALLS_URL"),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ),
    "REDIRECT_URL" => Array(
        "NAME" => GetMessage("MAIN_FEEDBACK_REDIRECT_URL"),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ),
);