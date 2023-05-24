<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 */

use Bitrix\Main\Localization\Loc;

$siteparam_main_phone = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_PHONE') ?? '';
$siteparam_main_phone_tel = substr(clear_symbols_in_phone_number($siteparam_main_phone), 1);
?>
<div class="main-form-section">
    <div class="container">
        <div class="row main-form-section__row">
            <div class="col-lg-6 main-form-section__content">
                <div class="main-form-section__text">
                    <?= Loc::getMessage('SECTION_MAIN_FORM_BEFORE_TEXT'); ?>
                    <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="main-form-section__selected-link"
                       onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_main_phone_tel; ?>'); return true;">
                        +7 <?= substr($siteparam_main_phone, 1); ?>
                    </a>
                    <?= Loc::getMessage('SECTION_MAIN_FORM_AFTER_TEXT'); ?>
                </div>
            </div>
            <div class="col-lg-6 main-form-section__form">
                <div class="main-form-section__form-wrapper">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "custom.bitrix:main.feedback",
                        "main_form",
                        array(
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                            "EMAIL_TO" => "sambo-msk@yandex.ru",
                            "EVENT_MESSAGE_ID" => array(
                                0 => "7",
                            ),
                            "OK_TEXT" => "Спасибо. Мы перезвоним Вам в течение дня!",
                            "REQUIRED_FIELDS" => array(
                                1 => "USER_PHONE",
                            ),
                            "USE_CAPTCHA" => "N",
                            "COMPONENT_TEMPLATE" => "main_form",
                            "HALLS_URL" => "/nashi-zaly/",
                            "REDIRECT_URL" => "/stranitsa-blagodarnosti.php"
                        ),
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>