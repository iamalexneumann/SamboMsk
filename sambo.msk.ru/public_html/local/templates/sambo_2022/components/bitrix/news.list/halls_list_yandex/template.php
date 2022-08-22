<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
use Bitrix\Main\Localization\Loc;

if ($arParams['YANDEX_API_KEY']) {
    $this->addExternalJS('https://api-maps.yandex.ru/2.1/?apikey=' . $arParams['YANDEX_API_KEY'] . '&lang=ru_RU');
    echo '<div id="halls-list-map" class="yandex-map halls-list-map"></div>';
} else {
    echo Loc::getMessage('HALLS_LIST_YANDEX_ERROR_MESSAGE');
}