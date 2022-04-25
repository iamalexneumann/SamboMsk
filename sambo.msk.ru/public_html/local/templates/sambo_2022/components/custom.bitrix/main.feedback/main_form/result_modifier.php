<?php
if (!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true) {
    die();
}
$arSelect = Array("NAME", "CODE");
$arFilter = Array("IBLOCK_ID" => 4, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");

$elements = [];

$res = CIBlockElement::GetList(Array("SORT" => "DESC"), $arFilter, false, false, $arSelect);

while($ob_arr = $res->Fetch()) {
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