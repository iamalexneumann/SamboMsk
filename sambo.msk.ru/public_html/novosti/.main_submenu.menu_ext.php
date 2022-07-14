<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;

if (CModule::IncludeModule("iblock")) {
  $arSelect = Array("NAME", "CODE", "IBLOCK_SECTION_ID");
  $arFilter = Array("IBLOCK_ID" => 7, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y");
  
  $elements = [];
  
  $res = CIBlockElement::GetList(Array("SORT" => "DESC"), $arFilter, false, false, $arSelect);

  while($ob_arr = $res->Fetch()) {
    $elements[] = $ob_arr;
  }

  $aMenuLinksExt = [];
  
  foreach ($elements as $element) {
      $res = CIBlockSection::GetByID($element["IBLOCK_SECTION_ID"]);
      if ($ar_res = $res->GetNext())
          $section_code = $ar_res['CODE'];
      $aMenuLinksExt[] = [
          $element["NAME"],
          "/novosti/" . $section_code . "/" . $element["CODE"] . "/",
          [],
          [],
          ""
      ];
  }

  $aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
}