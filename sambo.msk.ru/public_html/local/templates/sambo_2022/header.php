<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    use Bitrix\Main\Page\Asset;
    $Asset = Asset::getInstance();
    $Asset->addJs(SITE_TEMPLATE_PATH . '/libs/jquery-3.6.0.min.js');
    $Asset->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap/css/bootstrap.min.css');
    $Asset->addJs(SITE_TEMPLATE_PATH . '/libs/bootstrap/js/bootstrap.min.js');
    $Asset->addJs(SITE_TEMPLATE_PATH . '/main.js');
    $APPLICATION->ShowHead();
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/safari-pinned-tab.svg" color="#0652dd">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body>
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
            "PAGER_TITLE" => "Новости",
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
                <a<?php if (!($CurDir === '/')): ?> href="/" title="На главную"<?php endif; ?> class="logo header-logo">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler__text">меню</span>
                    <span class="navbar-toggler__icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="mainMenu">
                    <?php
                    $APPLICATION->IncludeComponent(
                    	"bitrix:menu", 
                    	"main_menu", 
                    	array(
                    		"ALLOW_MULTI_SELECT" => "N",
                    		"CHILD_MENU_TYPE" => "left",
                    		"DELAY" => "N",
                    		"MAX_LEVEL" => "2",
                    		"MENU_CACHE_GET_VARS" => array(
                    		),
                    		"MENU_CACHE_TIME" => "3600",
                    		"MENU_CACHE_TYPE" => "N",
                    		"MENU_CACHE_USE_GROUPS" => "Y",
                    		"ROOT_MENU_TYPE" => "top",
                    		"USE_EXT" => "Y",
                    		"COMPONENT_TEMPLATE" => "main_menu",
                    		"COMPOSITE_FRAME_MODE" => "A",
                    		"COMPOSITE_FRAME_TYPE" => "AUTO"
                    	),
                    	false
                    );?>
                    <div class="header-contacts">
                        <div class="header-contacts__phones">
                            <div class="header-contacts__phones-wrapper">
                                <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="header-contacts__main-phone">
                                    +7 <?= substr($siteparam_main_phone, 1); ?>
                                </a>
                                <?php if ($siteparam_second_phone_tel): ?>
                                <div class="header-contacts__second-phone-wrapper">
                                    <a href="tel:+7<?= $siteparam_second_phone_tel; ?>" class="header-contacts__second-phone">
                                        +7 <?= substr($siteparam_second_phone, 1); ?>
                                    </a>
                                    <?php if ($siteparam_whatsapp_number): ?>
                                    <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
                                       target="_blank" title="Написать в WhatsApp" class="header-contacts__whatsapp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="header-contacts__communication-wrapper">
                            <a href="mailto:<?= $siteparam_main_email; ?>" title="Написать E-mail" class="header-email">
                                <i class="fa-solid fa-envelope header-email__icon"></i>
                                <span class="header-email__link"><?= $siteparam_main_email; ?></span>
                            </a>
                            <?php if ($siteparam_telegram || $siteparam_vk): ?>
                            <ul class="social-media header-social-media">
                                <?php if ($siteparam_telegram): ?>
                                <li class="social-media__item">
                                    <a href="https://t.me/<?= $siteparam_telegram; ?>" target="_blank" title="Наш канал в Telegram" class="social-media__link social-media__telegram">
                                        <i class="fa-brands fa-telegram"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_vk): ?>
                                <li class="social-media__item">
                                    <a href="<?= $siteparam_vk; ?>" target="_blank" title="Наше сообщество в VK" class="social-media__link social-media__vk">
                                        <i class="fa-brands fa-vk"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
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
                );
                ?>
                <h1 class="page-header__title"><?php $APPLICATION->ShowTitle('h1', false); ?></h1>
            </div>
        </header>
        <?php if (use_wide_template($CurDir) === false): ?>
        <div class="container main-content">
        <?php endif; ?>
        <?php endif; ?>