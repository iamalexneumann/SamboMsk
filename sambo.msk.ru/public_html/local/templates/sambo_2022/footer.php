<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var COption $siteparam_footer_logo
 * @var COption $siteparam_site_name
 * @var COption $siteparam_main_logo_name
 * @var COption $siteparam_main_logo_description
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_text
 * @var COption $siteparam_whatsapp_text_converted
 * @var COption $siteparam_telegram_chat
 * @var COption $siteparam_section_body_after
 */

use Bitrix\Main\Localization\Loc;
?>
        <?php if ((!($CurDir === '/')) && !(use_wide_template($CurDir) === true)): ?>
        </div>
        <?php endif; ?>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_main_form.php'); ?>
    <footer class="main-footer">
        <div class="main-footer__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 main-footer__menu-wrapper">
                        <div class="footer-menu footer-menu-halls">
                            <a href="/nashi-zaly/" class="footer-menu__title"><?= Loc::getMessage('FOOTER_MENU_HALLS_TITLE'); ?></a>
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
                            <div class="footer-menu__title"><?= Loc::getMessage('FOOTER_MENU_MAIN_TITLE'); ?></div>
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
                        <a<?php if (!($CurDir === '/')): ?> href="/" title="<?= Loc::getMessage('HEADER_MAIN_LOGO_TITLE'); ?>"<?php endif; ?> class="logo footer-logo">
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
                        <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/block_contacts.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer__copyright">
            <div class="container">
                &copy; <?= $siteparam_site_name; ?>, 2016-<?= date('Y'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                <a href="/politika-konfidentsialnosti/" class="main-footer__copyright-link"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                <a href="/sitemaps/" class="main-footer__copyright-link"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
            </div>
        </div>
    </footer>

    <?php if ($siteparam_whatsapp_number): ?>
    <a class="whatsapp-btn" onclick="gtag('event', 'click', {'event_category': 'whatsapp', 'event_label': '', 'value': ''}); ym(56418265, 'reachGoal', 'whatsapp'); return true;"
       href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
       target="_blank"
       title="<?= Loc::getMessage('HEADER_WHATSAPP_TITLE'); ?>">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <?php endif; ?>
    <?php if ($siteparam_telegram_chat): ?>
    <a class="telegram-btn" onclick="gtag('event', 'click', {'event_category': 'telegram', 'event_label': '', 'value': ''}); ym(56418265, 'reachGoal', 'telegram'); return true;"
       href="<?= $siteparam_telegram_chat; ?>"
       target="_blank"
       title="<?= Loc::getMessage('HEADER_TELEGRAM_CHAT_TITLE'); ?>">
        <i class="fa-brands fa-telegram-plane"></i>
    </a>
    <?php endif; ?>

    <a href="#body-area" class="to-top-btn" title="<?= Loc::getMessage('FOOTER_TO_TOP_BTN_TEXT'); ?>"><i class="fa-solid fa-angle-up"></i></a>

    <?= $siteparam_section_body_after; ?>
    <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title fw-bold"><?= Loc::getMessage('CALLBACK_MODAL_TITLE'); ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>">
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
                    "EMAIL_TO" => "sambo-msk@yandex.ru",
                    "EVENT_MESSAGE_ID" => array(
                        0 => "7",
                    ),
                    "OK_TEXT" => Loc::getMessage('MODAL_FORM_OK_TEXT'),
                    "REQUIRED_FIELDS" => array(
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