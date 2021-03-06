<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
        <?php if ((!($CurDir === '/')) && !(use_wide_template($CurDir) === true)): ?>
        </div>
        <?php endif; ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_main_form_ru.php'); ?>
    <footer class="main-footer">
        <div class="main-footer__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 main-footer__menu-wrapper">
                        <div class="footer-menu footer-menu-halls">
                            <a href="/nashi-zaly/" class="footer-menu__title">Наши залы</a>
                            <?php
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "footer_menu",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "halls_menu",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "footer_menu",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                                    "CLASS_NAME" => "footer-menu__list_columns-two",
                                ),
                                false
                            );?>
                        </div>
                        <div class="footer-menu footer-menu-info">
                            <div class="footer-menu__title">Меню</div>
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
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "footer_menu",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "footer_menu",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                                ),
                                false
                            );?>
                        </div>
                    </div>
                    <div class="col-lg-4 main-footer__info-wrapper">
                        <a<?php if (!($CurDir === '/')): ?> href="/" title="На главную"<?php endif; ?> class="logo footer-logo">
                            <img src="<?= $siteparam_footer_logo; ?>" alt="<?= $siteparam_site_name; ?>" width="75" height="75" class="logo__img">
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
                        <div class="footer-phones">
                            <i class="fa-solid fa-phone footer-phones__icon"></i>
                            <div class="footer-phones__wrapper">
                                <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="footer-phones__main-phone"
                                   onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_main_phone_tel; ?>'); return true;">
                                    +7 <?= substr($siteparam_main_phone, 1); ?>
                                </a>
                                <?php if ($siteparam_second_phone_tel): ?>
                                <a href="tel:+7<?= $siteparam_second_phone_tel; ?>" class="footer-phones__second-phone"
                                   onclick="ym(56418265, 'reachGoal', '7<?= $siteparam_second_phone_tel; ?>'); return true;">
                                    +7 <?= substr($siteparam_second_phone, 1); ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger footer-btn-callback" data-bs-toggle="modal" data-bs-target="#callbackModal">Заказать звонок</button>
                        <a href="mailto:<?= $siteparam_main_email; ?>" title="Написать E-mail" class="footer-email">
                            <i class="fa-solid fa-envelope footer-email__icon"></i>
                            <span class="footer-email__link"><?= $siteparam_main_email; ?></span>
                        </a>
                        <?php if ($siteparam_telegram || $siteparam_vk || $siteparam_whatsapp_number): ?>
                        <ul class="social-media footer-social-media">
                            <?php if ($siteparam_telegram): ?>
                            <li class="social-media__item">
                                <a href="<?= $siteparam_telegram; ?>" target="_blank" title="Наш канал в Telegram" class="social-media__link social-media__telegram">
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
                            <?php if ($siteparam_whatsapp_number): ?>
                            <li class="social-media__item">
                                <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>" target="_blank" title="Написать в WhatsApp" class="social-media__link social-media__whatsapp">
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
        <div class="main-footer__copyright">
            <div class="container">
                &copy; <?= $siteparam_site_name; ?>, 2016-<?= date('Y'); ?>. Все права защищены.
                <a href="/politika-konfidentsialnosti/" class="main-footer__copyright-link">Политика конфиденциальности</a>
                <a href="/sitemaps/" class="main-footer__copyright-link">Карта сайта</a>
            </div>
        </div>
    </footer>
    <?php if ($siteparam_whatsapp_number): ?>
    <a class="whatsapp-btn" onclick="gtag('event', 'click', {'event_category': 'whatsapp', 'event_label': '', 'value': ''}); ym(56418265, 'reachGoal', 'whatsapp'); return true;"
       href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>" target="_blank" title="Написать в WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <?php endif; ?>
    <a href="#body-area" class="to-top-btn" title="Наверх"><i class="fa-solid fa-angle-up"></i></a>
    <?= $siteparam_section_body_after; ?>
    <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title fw-bold">Заказать звонок</div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть">
                <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="modal-body">
            <?php
            $APPLICATION->IncludeComponent(
                "custom.bitrix:main.feedback",
                "modal_form",
                array(
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "EMAIL_TO" => "sambo-msk@yandex.ru, iamalexneumann@yandex.ru",
                    "EVENT_MESSAGE_ID" => array(
                        0 => "7",
                    ),
                    "OK_TEXT" => "Спасибо. Мы перезвоним Вам в течение дня!",
                    "REQUIRED_FIELDS" => array(
                        0 => "NAME",
                        1 => "USER_PHONE",
                    ),
                    "USE_CAPTCHA" => "N",
                    "COMPONENT_TEMPLATE" => "modal_form",
                    "REDIRECT_URL" => "/stranitsa-blagodarnosti.php",
                ),
                false
            ); ?>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php
create_og_img(
    $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/img/og-media-main-img.jpg',
    htmlspecialchars_decode($APPLICATION->GetTitle(false)),
    get_img_name_from_cur_dir($CurDir)
); ?>