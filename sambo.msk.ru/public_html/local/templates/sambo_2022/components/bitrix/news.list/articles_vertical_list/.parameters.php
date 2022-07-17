<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"TAG_TITLE" => [
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TAG_TITLE"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => [
			"2" => "<h2>",
			"3" => "<h3>",
			"4" => "<h4>",
			"5" => "<h5>",
			"6" => "<h6>"
		],
		"DEFAULT" => "1",
	],
	"TAG_LIST" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TAG_LIST"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"SHOW_CTA_FORM" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHOW_CTA_FORM"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"CTA_FORM_POSITION" => [
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_CTA_FORM_POSITION"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
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
?>
