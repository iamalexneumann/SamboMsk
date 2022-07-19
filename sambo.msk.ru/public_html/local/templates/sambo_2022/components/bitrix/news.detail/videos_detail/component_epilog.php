<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$APPLICATION->AddViewContent(
    'siteparamArticleModifiedTime',
    '<meta property="article:modified_time" content="' . FormatDate("Y-m-dТH:i:s+03:00", strtotime($arResult['TIMESTAMP_X'])) . '">'
);