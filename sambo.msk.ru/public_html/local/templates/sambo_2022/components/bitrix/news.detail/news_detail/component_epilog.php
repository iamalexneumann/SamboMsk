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
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;

Extension::load(
    [
        'ui.fancybox',
    ]
);
echo '<script>
    Fancybox.bind("[data-fancybox]", {
        l10n: Fancybox.l10n.ru
    });
</script>';
?>
<?php if ($arResult['VIEW_COUNT']): ?>
<div class="views-counter">
    <i class="fa-solid fa-eye views-counter__icon"></i>
    <span class="views-counter__text"><?= $arResult['VIEW_COUNT']; ?></span>
</div>
<?php endif; ?>
<?php if ($arResult['TELEGRAM_DISCUSSION']): ?>
<div class="main-section">
    <div class="main-section__title"><?= Loc::getMessage('NEWS_DETAIL_DISCUSSION_TITLE'); ?></div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <script async src="https://telegram.org/js/telegram-widget.js?19" data-skip-moving="true"
                    data-telegram-discussion="<?= $arResult['TELEGRAM_DISCUSSION']; ?>>"
                    data-comments-limit="5"></script>
        </div>
    </div>
</div>
<?php endif; ?>
<?php
CIBlockElement::CounterInc($arResult['ID']);

$APPLICATION->AddViewContent(
    'META_ARTICLE_MODIFIED_TIME',
    '<meta property="article:modified_time" content="' . FormatDate('Y-m-dТH:i:s+03:00', strtotime($arResult['TIMESTAMP_X'])) . '">'
);
$APPLICATION->AddViewContent(
    'META_ARTICLE_PUBLISHED_TIME',
    '<meta property="article:published_time" content="' . FormatDate('Y-m-dТH:i:s+03:00', strtotime($arResult['DATE_CREATE'])) . '">'
);

$APPLICATION->AddViewContent(
    'META_ARTICLE_SECTION',
    '<meta property="article:section" content="' . $arResult["SECTION"]["PATH"][0]["NAME"] . '">'
);

//create_og_img(
//    $_SERVER['DOCUMENT_ROOT'] . $arResult['OG_PICTURE_SRC'],
//    htmlspecialchars_decode($arResult['NAME']),
//    get_img_name_from_cur_dir($APPLICATION->GetCurDir())
//);