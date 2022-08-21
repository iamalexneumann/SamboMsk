<?php
$siteparam_main_phone = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_PHONE') ?? '';
$siteparam_main_phone_tel = substr(clear_symbols_in_phone_number($siteparam_main_phone), 1);
?>
<div class="inner-form-section">
    <div class="inner-form-section__content">
        <div class="inner-form-section__text">
            Чтобы <span class="inner-form-section__selected-text">записаться на бесплатное пробное занятие</span>
            позвоните по номеру телефона
            <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="inner-form-section__selected-link"
               onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_main_phone_tel; ?>'); return true;">
                +7 <?= substr($siteparam_main_phone, 1); ?>
            </a>
            или закажите звонок, и мы Вам перезвоним
        </div>
        <div class="text-center">
            <button type="button"
                    class="btn btn-danger inner-form-section__btn-callback"
                    data-bs-toggle="modal"
                    data-bs-target="#callbackModal"><i class="fa-solid fa-phone inner-form-section__btn-callback-icon"></i> Заказать звонок</button>
        </div>
    </div>
</div>