<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"YANDEX_API_KEY" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_YANDEX_API_KEY"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"MAP_CENTER" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_MAP_CENTER"),
		"TYPE" => "STRING",
		"DEFAULT" => "55.76, 37.64",
	),
	"MAP_ZOOM" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_MAP_ZOOM"),
		"TYPE" => "STRING",
		"DEFAULT" => "9",
	),
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
);
