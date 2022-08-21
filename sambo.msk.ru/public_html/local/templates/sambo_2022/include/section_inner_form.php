<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
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
            <?= Loc::getMessage('SECTION_INNER_FORM_AFTER_TEXT'); ?>
        </div>
        <div class="text-center">
            <button type="button"
                    class="btn btn-danger inner-form-section__btn-callback"
                    data-bs-toggle="modal"
                    data-bs-target="#callbackModal"><i class="fa-solid fa-phone inner-form-section__btn-callback-icon"></i> <?= Loc::getMessage('SECTION_INNER_FORM_BTN_CALLBACK_TEXT'); ?></button>
        </div>
    </div>
</div>