<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CBitrixComponent $component
 */
global $APPLICATION;
use Bitrix\Main\Localization\Loc;

$siteparam_main_phone = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_PHONE') ?? '';
$siteparam_main_phone_tel = substr(clear_symbols_in_phone_number($siteparam_main_phone), 1);
?>
<div class="inner-form-section">
    <div class="inner-form-section__content">
        <div class="inner-form-section__text">
            <?= Loc::getMessage('SECTION_INNER_FORM_BEFORE_TEXT'); ?>
            <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="inner-form-section__selected-link"
               onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_main_phone_tel; ?>'); return true;">
                +7 <?= substr($siteparam_main_phone, 1); ?>
            </a>
            <?= Loc::getMessage('SECTION_INNER_FORM_AFTER_TEXT'); ?>.
        </div>
        <div class="inner-form__wrapper">
            <?php
            $APPLICATION->IncludeComponent(
                "custom.bitrix:main.feedback",
                "modal_form",
                array(
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "EMAIL_TO" => "sambo-msk@yandex.ru",
                    "EVENT_MESSAGE_ID" => array(
                        0 => "7",
                    ),
                    "OK_TEXT" => Loc::getMessage('MODAL_FORM_OK_TEXT'),
                    "REQUIRED_FIELDS" => array(
                        0 => "NAME",
                        1 => "USER_PHONE",
                    ),
                    "USE_CAPTCHA" => "N",
                    "COMPONENT_TEMPLATE" => "modal_form",
                    "REDIRECT_URL" => "/stranitsa-blagodarnosti.php",
                ),
                $component,
                Array(
                    "HIDE_ICONS" => "Y"
                )
            ); ?>
        </div>
    </div>
</div>