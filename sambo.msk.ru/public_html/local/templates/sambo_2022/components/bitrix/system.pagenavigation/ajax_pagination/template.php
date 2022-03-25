<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
		return;
	}
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");

if($arResult["bDescPageNumbering"] === true):
    if ($arResult["NavPageNomer"] > 1):?>
		<a class="btn btn-primary" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]-1); ?>" id="ajaxNextPageBtn"><?= GetMessage("LOAD_MORE"); ?></a>
    <?php
    endif;
elseif($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<a class="btn btn-primary" href="<?= $arResult["sUrlPath"]; ?>?<?= $strNavQueryString; ?>PAGEN_<?= $arResult["NavNum"]; ?>=<?= ($arResult["NavPageNomer"]+1); ?>" id="ajaxNextPageBtn"><?= GetMessage("LOAD_MORE"); ?></a>
<?php endif; ?>
