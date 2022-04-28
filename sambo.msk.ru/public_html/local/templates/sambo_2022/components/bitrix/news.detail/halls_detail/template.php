<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
$this->setFrameMode(true);
$att_set_open = $arResult["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"];
$att_address = $arResult["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"];
$att_phones = $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"];
$att_features = $arResult["DISPLAY_PROPERTIES"]["ATT_FEATURES"];
?>
<div class="first-screen">
    <div class="container first-screen__container">
        <div class="first-screen__wrapper">
            <div class="first-screen__title"><?= $arResult["NAME"]; ?></div>
            <?php if ($att_set_open): ?>
            <div class="set-open">
                <div class="set-open__icons set-open__icons_<?php if ($att_set_open === 'Да'): ?>open<?php else: ?>closed<?php endif; ?>">
                    <?php
                    $circle_count = 3;
                    for ($i = 1; $i <= $circle_count; $i++) {
                        if (($i === $circle_count) && ($att_set_open === 'Да')) {
                            echo '<i class="set-open__icon fa-solid fa-circle-half-stroke"></i>';
                        } else {
                            echo '<i class="set-open__icon fa-solid fa-circle"></i>';
                        }
                    }
                    ?>
                </div>
                <div class="set-open__text">
                    <?php
                    if ($att_set_open === 'Да') {
                        echo GetMessage("set_open_text_open");
                    } else {
                        echo GetMessage("set_open_text_closed");
                    } ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($att_address): ?>
                <div class="hall__address">
                    <i class="hall__address-icon fa-solid fa-location-dot"></i>
                    <div class="hall__address-text"><?= $att_address; ?></div>
                </div>
            <?php endif; ?>
            <?php if ($att_phones): ?>
                <div class="hall__phones">
                    <?php
                    foreach ($att_phones["VALUE"] as $key => $phone_number):
                        $phone_description = $att_phones["DESCRIPTION"][$key];
                        ?>
                        <div class="hall__phone-item">
                            <i class="hall__phone-icon fa-solid fa-phone"></i>
                            <a href="tel:+7<?= clear_symbols_in_phone_number(substr($phone_number, 1)); ?>"
                               class="hall__phone-link">+7 <?= substr($phone_number, 1); ?></a>
                            <?php if ($phone_description): ?>
                                <div class="hall__phone-description">(<?= $phone_description; ?>)</div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($att_features): ?>
            <ul class="screen-features">
                <?php
                foreach ($att_features["~VALUE"] as $key => $feature_icon):
                    $feature_description = $att_features["DESCRIPTION"][$key];
                    ?>
                    <li class="screen-features__item">
                        <div class="screen-features__icon"><?= $feature_icon; ?></div>
                        <?php if ($feature_description): ?>
                        <div class="screen-features__description"><?= $feature_description; ?></div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_TEMPLATE_PATH . "/include/section_features_ru.php",
    )
);
?>
