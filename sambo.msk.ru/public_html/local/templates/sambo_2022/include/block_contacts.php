<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
require($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/site_variables.php');
/**
 * @var CMain $CurDir
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_second_phone
 * @var COption $siteparam_second_phone_tel
 * @var COption $siteparam_main_email
 * @var COption $siteparam_telegram
 * @var COption $siteparam_vk
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_text
 * @var COption $siteparam_whatsapp_text_converted
 */

use Bitrix\Main\Localization\Loc;
?>

<div class="footer-phones">
    <i class="fa-solid fa-phone footer-phones__icon"></i>
    <div class="footer-phones__wrapper">
        <?php if (use_comagic($CurDir) === false): ?>
        <a href="tel:+7<?= $siteparam_main_phone_tel; ?>"
           class="footer-phones__main-phone"
           onclick="ym(56418265,'reachGoal','all_phone_link'); return true;">
            +7 <?= substr($siteparam_main_phone, 1); ?>
        </a>
        <?php endif; ?>
        <?php if ($siteparam_second_phone_tel): ?>
        <a href="tel:+7<?= $siteparam_second_phone_tel; ?>"
           class="footer-phones__<?= (use_comagic($CurDir) === false) ? 'second' : 'main'; ?>-phone mb-0"
           onclick="ym(56418265,'reachGoal','all_phone_link'); return true;">
            +7 <?= substr($siteparam_second_phone, 1); ?>
        </a>
        <?php endif; ?>
    </div>
</div>
<button type="button" class="btn btn-danger footer-btn-callback"
        data-bs-toggle="modal"
        data-bs-target="#callbackModal"><?= Loc::getMessage('BLOCK_CONTACTS_BTN_CALLBACK_TEXT'); ?></button>
<a href="mailto:<?= $siteparam_main_email; ?>"
   title="<?= Loc::getMessage('BLOCK_CONTACTS_MAIN_EMAIL_TITLE'); ?>"
   class="footer-email">
    <i class="fa-solid fa-envelope footer-email__icon"></i>
    <span class="footer-email__link"><?= $siteparam_main_email; ?></span>
</a>
<?php if ($siteparam_telegram || $siteparam_vk || $siteparam_whatsapp_number): ?>
<ul class="social-media footer-social-media">
    <?php if ($siteparam_telegram): ?>
    <li class="social-media__item">
        <a href="<?= $siteparam_telegram; ?>" target="_blank"
           title="<?= Loc::getMessage('BLOCK_CONTACTS_MAIN_TELEGRAM_TITLE'); ?>"
           class="social-media__link social-media__telegram">
            <i class="fa-brands fa-telegram"></i>
        </a>
    </li>
    <?php endif; ?>
    <?php if ($siteparam_vk): ?>
    <li class="social-media__item">
        <a href="<?= $siteparam_vk; ?>" target="_blank"
           title="<?= Loc::getMessage('BLOCK_CONTACTS_MAIN_VK_TITLE'); ?>" class="social-media__link social-media__vk">
            <i class="fa-brands fa-vk"></i>
        </a>
    </li>
    <?php endif; ?>
    <?php if ($siteparam_whatsapp_number): ?>
    <li class="social-media__item">
        <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
           target="_blank" title="<?= Loc::getMessage('BLOCK_CONTACTS_MAIN_WHATSAPP_TITLE'); ?>"
           class="social-media__link social-media__whatsapp"
           onclick="ym(56418265,'reachGoal','all_messengers'); return true;">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </li>
    <?php endif; ?>
</ul>
<?php endif; ?>