<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="page-contacts">
    <section class="main-section">
        <div class="container">
            <h2 class="d-none">Контакты и реквизиты "МСК Три медведя"</h2>
            <div class="row">
                <div class="col-lg-5 contacts-block">
                    <a class="contacts-block__title" href="/nashi-zaly/">Наши залы</a>
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer_menu",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "footer_menu",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                            "CLASS_NAME" => "footer-menu__list_columns-two footer-menu__list_page-contacts",
                        ),
                        false
                    );?>
                </div>
                <div class="col-lg-4 contacts-block">
                    <div class="contacts-block__title">Реквизиты</div>
                    <?php if ($siteparam_requisites): ?>
                    <div class="contacts-block__requisites">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $siteparam_requisites,
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
                    ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 contacts-block">
                    <div class="contacts-block__title">Контакты</div>
                    <div class="contacts-block__communications">
                        <div class="footer-phones">
                            <i class="fa-solid fa-phone footer-phones__icon"></i>
                            <div class="footer-phones__wrapper">
                                <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="footer-phones__main-phone">
                                    +7 <?= substr($siteparam_main_phone, 1); ?>
                                </a>
                                <?php if ($siteparam_second_phone_tel): ?>
                                <a href="tel:+7<?= $siteparam_second_phone_tel; ?>" class="footer-phones__second-phone">
                                    +7 <?= substr($siteparam_second_phone, 1); ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger footer-btn-callback">Заказать звонок</button>
                        <a href="mailto:<?= $siteparam_main_email; ?>" title="Написать E-mail" class="footer-email">
                            <i class="fa-solid fa-envelope footer-email__icon"></i>
                            <span class="footer-email__link"><?= $siteparam_main_email; ?></span>
                        </a>
                        <?php if ($siteparam_telegram || $siteparam_vk || $siteparam_whatsapp_number): ?>
                            <ul class="social-media footer-social-media">
                                <?php if ($siteparam_telegram): ?>
                                <li class="social-media__item">
                                    <a href="https://t.me/<?= $siteparam_telegram; ?>" target="_blank"
                                       title="Наш канал в Telegram" class="social-media__link social-media__telegram">
                                        <i class="fa-brands fa-telegram"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_vk): ?>
                                <li class="social-media__item">
                                    <a href="<?= $siteparam_vk; ?>" target="_blank"
                                       title="Наше сообщество в VK" class="social-media__link social-media__vk">
                                        <i class="fa-brands fa-vk"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_whatsapp_number): ?>
                                <li class="social-media__item">
                                    <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
                                       target="_blank" title="Написать в WhatsApp" class="social-media__link social-media__whatsapp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_halls_yandex_ru.php'); ?>
</div>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>