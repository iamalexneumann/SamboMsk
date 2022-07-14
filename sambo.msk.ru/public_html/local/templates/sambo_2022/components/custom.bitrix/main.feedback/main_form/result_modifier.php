<?php
if (!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true) {
    die();
}
if (CModule::IncludeModule("iblock")) {
    $arSelect = array("NAME", "CODE");
    $arFilter = array("IBLOCK_ID" => 4, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");

    $elements = [];

    $res = CIBlockElement::GetList(array("SORT" => "DESC"), $arFilter, false, false, $arSelect);

    while ($ob_arr = $res->Fetch()) {
        $elements[] = $ob_arr;
    }

    $halls_list = [];

    foreach ($elements as $element) {
        $halls_list[] = [
            "NAME" => $element["NAME"],
            "CODE" => $element["CODE"],
        ];
    }
    $GLOBALS['halls_list'] = $halls_list;
}