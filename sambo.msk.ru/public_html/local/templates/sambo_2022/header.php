<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    use Bitrix\Main\Page\Asset;
    $Asset = Asset::getInstance();
    //$Asset->addJs(SITE_TEMPLATE_PATH . '/libs/jquery/jquery-3.6.0.min.js');
    $Asset->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap/css/bootstrap.min.css');
    $Asset->addJs(SITE_TEMPLATE_PATH . '/libs/bootstrap/js/bootstrap.min.js');
    //$Asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
    $APPLICATION->ShowHead();
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light">
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
                    <span class="navbar-toggler-icon"></span>
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
<!--                    .header-->
                </div>
            </div>
        </nav>
        
    </header>
    <main>
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
        <div class="container main-content">