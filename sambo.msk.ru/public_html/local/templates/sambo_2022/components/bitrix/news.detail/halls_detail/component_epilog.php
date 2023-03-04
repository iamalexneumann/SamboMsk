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
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var string $epilogFile
 * @var array $templateData
 * @var CBitrixComponent $component
 */
use Bitrix\Main\UI\Extension;

if ($arResult['USE_MASONRY']) {
    Extension::load(
        [
            'ui.masonry',
        ]
    );
}

if ($arResult['ATT_PHOTOS_COUNT'] > 1 || $arResult['ATT_CONTACTS_PHOTOS_COUNT'] > 1) {
    Extension::load(
        [
            'ui.fancybox',
        ]
    );
    echo '<script>Fancybox.bind("[data-fancybox]", {});</script>';
}

$APPLICATION->AddViewContent(
    'META_ARTICLE_MODIFIED_TIME',
    '<meta property="article:modified_time" content="' . FormatDate('Y-m-dТH:i:s+03:00', strtotime($arResult['TIMESTAMP_X'])) . '">'
);
$APPLICATION->AddViewContent(
    'META_ARTICLE_PUBLISHED_TIME',
    '<meta property="article:published_time" content="' . FormatDate('Y-m-dТH:i:s+03:00', strtotime($arResult['DATE_CREATE'])) . '">'
);

create_og_img(
    $_SERVER['DOCUMENT_ROOT'] . $arResult['OG_PICTURE_SRC'],
    htmlspecialchars_decode($arResult['NAME']),
    get_img_name_from_cur_dir($APPLICATION->GetCurDir())
);