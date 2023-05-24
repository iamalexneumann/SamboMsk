<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var COption $siteparam_section_head
 * @var COption $siteparam_section_body_before
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_site_name
 * @var COption $siteparam_main_logo_name
 * @var COption $siteparam_main_logo_description
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_second_phone_tel
 * @var COption $siteparam_second_phone
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_text
 * @var COption $siteparam_whatsapp_text_converted
 * @var COption $siteparam_main_email
 * @var COption $siteparam_telegram_chat
 * @var COption $siteparam_vk
 */

use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>"
      prefix="og: https://ogp.me/ns# article: https://ogp.me/ns/article#">
<head>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?= $siteparam_section_head; ?>
    <?php
    use Bitrix\Main\UI\Extension;
    use Bitrix\Main\Page\Asset;
    Extension::load(
        [
            'ui.bootstrap5',
            'ui.fonts.font-awesome',
            'ui.fonts.opensans',
            'ui.lazysizes',
        ]
    );
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/main.js');
    $APPLICATION->ShowHead();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <!-- Favisons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/safari-pinned-tab.svg" color="#0652dd">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter  -->
    <meta name="twitter:card" content="summary_large_image">
<!--    <meta name="twitter:site" content="@">-->
    <meta name="twitter:title" content="<?= htmlspecialchars($APPLICATION->GetProperty('title')); ?>">
    <meta name="twitter:url" content="https://<?= SITE_SERVER_NAME . $CurDir; ?>">
    <meta name="twitter:domain" content="<?= SITE_SERVER_NAME; ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($APPLICATION->GetProperty('description')); ?>">
    <meta name="twitter:image" content="https://<?= SITE_SERVER_NAME . SITE_TEMPLATE_PATH . '/img/og-media/' . get_img_name_from_cur_dir($CurDir) ?>?date=<?= date("Ymd"); ?>">
    <!-- OG  -->
    <meta property="article:author" content="https://<?= SITE_SERVER_NAME; ?>">
    <?php $APPLICATION->ShowViewContent('META_ARTICLE_PUBLISHED_TIME'); ?>
    <?php $APPLICATION->ShowViewContent('META_ARTICLE_MODIFIED_TIME'); ?>
    <?php $APPLICATION->ShowViewContent('META_ARTICLE_SECTION'); ?>
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= htmlspecialchars($APPLICATION->GetProperty('title')); ?>">
    <meta property="og:url" content="https://<?= SITE_SERVER_NAME . $CurDir; ?>">
    <meta property="og:image" content="https://<?= SITE_SERVER_NAME . SITE_TEMPLATE_PATH . '/img/og-media/' . get_img_name_from_cur_dir($CurDir) ?>?date=<?= date("Ymd"); ?>">
    <meta property="og:site_name" content="<?= $siteparam_site_name; ?>">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">
    <meta property="og:description" content="<?= htmlspecialchars($APPLICATION->GetProperty('description')); ?>">
</head>
<body id="body-area">
    <?= $siteparam_section_body_before; ?>
    <?php $APPLICATION->ShowPanel(); ?>
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "promo_list",
        array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "N",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "12",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "5",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "ATT_PREVIEW_TEXT",
                1 => "ATT_BTN_TEXT",
                2 => "ATT_BTN_LINK",
                3 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N",
            "COMPONENT_TEMPLATE" => "promo_list"
        ),
        false
    ); ?>
    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-xl navbar-light">
            <div class="container-fluid">
                <a<?php if (!($CurDir === '/')): ?> href="/" title="<?= Loc::getMessage('HEADER_MAIN_LOGO_TITLE'); ?>"<?php endif; ?> class="logo header-logo">
                    <img src="<?= $siteparam_main_logo; ?>" alt="<?= $siteparam_site_name; ?>" width="75" height="75" class="logo__img">
                    <?php if ($siteparam_main_logo_name || $siteparam_main_logo_description): ?>
                    <span class="logo__wrapper">
                        <?php if ($siteparam_main_logo_name): ?>
                        <span class="logo__name"><?= $siteparam_main_logo_name; ?></span>
                        <?php endif; ?>
                        <?php if ($siteparam_main_logo_description): ?>
                        <span class="logo__description"><?= $siteparam_main_logo_description; ?></span>
                        <?php endif; ?>
                    </span>
                    <?php endif; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="<?= Loc::getMessage('HEADER_NAVBAR_ARIA_LABEL'); ?>">
                    <span class="navbar-toggler__text"><?= Loc::getMessage('HEADER_NAVBAR_BTN_TEXT'); ?></span>
                    <span class="navbar-toggler__icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="mainMenu">
                    <div class="me-auto ms-auto">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "main_submenu",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "main_menu",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => "main_menu",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO"
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="header-contacts">
                        <div class="header-contacts__phones">
                            <div class="header-contacts__phones-wrapper">
                                <a href="tel:+7<?= $siteparam_main_phone_tel; ?>"
                                   class="header-contacts__main-phone"
                                   onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_main_phone_tel; ?>'); return true;">
                                    +7 <?= substr($siteparam_main_phone, 1); ?>
                                </a>
                                <?php if ($siteparam_second_phone_tel): ?>
                                <div class="header-contacts__second-phone-wrapper">
                                    <a href="tel:+7<?= $siteparam_second_phone_tel; ?>"
                                       class="header-contacts__second-phone"
                                       onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_second_phone_tel; ?>'); return true;">
                                        +7 <?= substr($siteparam_second_phone, 1); ?>
                                    </a>
                                    <?php if ($siteparam_whatsapp_number): ?>
                                    <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_WHATSAPP_TITLE'); ?>"
                                       class="header-contacts__whatsapp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if ($siteparam_telegram_chat): ?>
                                    <a href="<?= $siteparam_telegram_chat; ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_TELEGRAM_CHAT_TITLE'); ?>"
                                       class="header-contacts__telegram">
                                        <i class="fa-brands fa-telegram-plane"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="header-contacts__communication-wrapper">
                            <a href="mailto:<?= $siteparam_main_email; ?>"
                               title="<?= Loc::getMessage('HEADER_EMAIL_TITLE'); ?>"
                               class="header-email">
                                <i class="fa-solid fa-envelope header-email__icon"></i>
                                <span class="header-email__link"><?= $siteparam_main_email; ?></span>
                            </a>
                            <?php if ($siteparam_vk): ?>
                            <ul class="social-media header-social-media">
                                <li class="social-media__item">
                                    <a href="<?= $siteparam_vk; ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_VK_TITLE'); ?>"
                                       class="social-media__link social-media__vk">
                                        <i class="fa-brands fa-vk"></i>
                                    </a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php if (!($CurDir === '/')): ?>
        <header class="page-header">
            <div class="container">
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => SITE_ID,
                    ),
                    false
                ); ?>
                <h1 class="page-header__title"><?php $APPLICATION->ShowTitle(false); ?></h1>
            </div>
        </header>
        <?php if (use_wide_template($CurDir) === false): ?>
        <div class="container main-content">
        <?php endif; ?>
        <?php endif; ?>