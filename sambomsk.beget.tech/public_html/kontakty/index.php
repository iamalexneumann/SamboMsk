<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты школы самбо и дзюдо \"Три Медведя\"");
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
                    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/block_contacts_ru.php'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_halls_yandex_ru.php'); ?>
</div>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>