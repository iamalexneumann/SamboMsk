<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
$this->setFrameMode(true);
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent $component
 */
$att_address = $arResult["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"];
$att_phones = $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"];
$att_features = $arResult["DISPLAY_PROPERTIES"]["ATT_FEATURES"];
$att_photos = $arResult["DISPLAY_PROPERTIES"]["ATT_PHOTOS"] ?? '';
$att_videos = $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"] ?? '';
$att_coaches_list = $arResult["DISPLAY_PROPERTIES"]["ATT_COACHES_LIST"]["VALUE"] ?? '';
?>
<div class="first-screen"
    <?php if ($arResult["PICTURE"]): ?> style="background: linear-gradient(90deg, #00369E 0%, rgba(6, 82, 221, 0) 85%),
            url(<?= $arResult["PICTURE"]["SRC"]; ?>) 50% 50%; background-size: cover;"<?php endif; ?>>
    <div class="container first-screen__container">
        <div class="first-screen__wrapper">
            <header class="first-screen__header">
                <div class="first-screen__title"><?= $arResult["NAME"]; ?></div>
                <?php if ($arResult["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"]): ?>
                <div class="first-screen__open-text"><?= $arResult["SET_OPEN_TEXT"]; ?></div>
                <?php endif; ?>
            </header>
            <?php if ($att_features): ?>
            <ul class="screen-features">
                <?php foreach ($att_features["VALUE"] as $key => $feature_title): ?>
                <li class="screen-features__item">
                    <?php if ($att_features["~DESCRIPTION"][$key]): ?>
                    <div class="screen-features__icon"><?= $att_features["~DESCRIPTION"][$key]; ?></div>
                    <?php endif; ?>
                    <div class="screen-features__description"><?= $feature_title; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <footer class="first-screen__footer">
                <?php if ($att_address): ?>
                <div class="screen-address">
                    <i class="screen-address__icon fa-solid fa-location-dot"></i>
                    <div class="screen-address__text"><?= $att_address; ?></div>
                </div>
                <?php endif; ?>
                <?php if ($att_phones): ?>
                <div class="screen-phones">
                    <?php foreach ($att_phones["VALUE"] as $key => $phone_number): ?>
                    <div class="screen-phones__item">
                        <i class="screen-phones__icon fa-solid fa-phone"></i>
                        <a href="tel:+7<?= $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_TEL"][$key]; ?>"
                           class="screen-phones__link"
                           onclick="ym(56418265, 'reachGoal', '7<?= $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_TEL"][$key]; ?>'); return true;"><?= $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_FORMATTED"][$key]; ?></a>
                        <?php if ($att_phones["DESCRIPTION"][$key]): ?>
                        <div class="screen-phones__description">(<?= $att_phones["DESCRIPTION"][$key]; ?>)</div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </footer>
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
<?php if ($arResult["DISPLAY_PROPERTIES"]["ATT_PRICE"]["~VALUE"]): ?>
<section class="main-section">
    <div class="container text-center">
        <h2 class="main-section__title"><?= GetMessage("PRICE_SECTION_TITLE"); ?></h2>
        <?php
        $GLOBALS['captionPriceTable'] = $arResult["NAME"] . ' - ' . mb_strtolower(GetMessage("PRICE_SECTION_TITLE"));
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult["DISPLAY_PROPERTIES"]["ATT_PRICE"]["~VALUE"],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
        ?>
    </div>
</section>
<?php endif; ?>
<?php
if ($arResult["DISPLAY_PROPERTIES"]["ATT_SCHEDULE"]["~VALUE"]):
    $this->addExternalJs(SITE_TEMPLATE_PATH . '/libs/masonry.pkgd.min.js');
?>
<section class="main-section schedule-section">
    <div class="container">
        <h2 class="main-section__title"><?= GetMessage("SCHEDULE_SECTION_TITLE"); ?></h2>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <?php
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $arResult["DISPLAY_PROPERTIES"]["ATT_SCHEDULE"]["~VALUE"],
                ),
                $component,
                Array(
                    "HIDE_ICONS" => "Y"
                )
            );
            ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
if ($att_photos):
    $this->addExternalCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
    $this->addExternalJS(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
    ?>
<figure role="group" class="photos-list main-section d-flex flex-column-reverse">
    <div class="container">
        <div class="row photos-list__row">
            <?php
            foreach($att_photos['VALUE'] as $key => $att_photo):
                $att_photo_description = $att_photos['DESCRIPTION'][$key] ?? '';
                ?>
                <div class="col-lg-4 col-6 photos-list__col">
                    <figure class="photos-list__item">
                        <a href="<?= $att_photos['FILE_VALUE'][$key]['SRC']; ?>" data-fancybox="photos-list" class="photos-list__link"
                            <?php if ($att_photo_description): ?>
                                title="<?= $att_photo_description; ?>"
                                data-caption="<?= $att_photo_description; ?>"
                            <?php endif; ?>>
                            <img src="<?= $att_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                                 data-src="<?= $att_photos['PICTURE'][$key]['SRC']; ?>"
                                 alt="<?= $att_photo_description; ?>"
                                 class="photos-list__img lazyload blur-up"
                                 width="<?= $att_photos['PICTURE'][$key]['WIDTH']; ?>" height="<?= $att_photos['PICTURE'][$key]['HEIGHT']; ?>">
                        </a>
                        <?php if ($att_photo_description): ?>
                        <figcaption class="photos-list__item-figcaption"><?= $att_photo_description; ?></figcaption>
                        <?php endif; ?>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <figcaption class="photos-list__main-figcaption main-section__title container"><?= $arResult["NAME"] . ' - ' . GetMessage("PHOTO_FIGCAPTION_TEXT"); ?></figcaption>
</figure>
<?php endif; ?>
<?php if ($att_videos): ?>
<figure role="group" class="videos-list main-section d-flex flex-column-reverse">
    <div class="container">
        <div class="row videos-list__row">
            <?php
            foreach($att_videos['VALUE'] as $key => $att_video):
                $att_video_description = $att_videos['DESCRIPTION'][$key] ?? '';
                ?>
            <div class="col-lg-6 videos-list__col">
                <figure class="videos-list__item">
                    <div class="adaptive-video-container">
                        <iframe data-src="https://www.youtube.com/embed/<?= $att_videos["YOUTUBE_ID"][$key]; ?>" class="lazyload"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            <?php if ($att_video_description): ?> title="<?= $att_video_description; ?>"<?php endif; ?>
                                allowfullscreen></iframe>
                    </div>
                    <?php if ($att_video_description): ?>
                    <figcaption class="videos-list__item-figcaption"><?= $att_video_description; ?></figcaption>
                    <?php endif; ?>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <figcaption class="videos-list__main-figcaption main-section__title container"><?= $arResult["NAME"] . ' - ' . GetMessage("VIDEO_FIGCAPTION_TEXT"); ?></figcaption>
</figure>
<?php endif; ?>
<?php if ($att_coaches_list): ?>
<section class="main-section">
    <div class="container">
        <h2 class="main-section__title"><?= GetMessage("COACHES_LIST_SECTION_TITLE"); ?></h2>
        <div class="main-section__subtitle"><?= GetMessage("COACHES_LIST_SECTION_SUBTITLE"); ?></div>
        <div class="main-section__text-link-wrapper">
            <a href="/o-nas/trenery/" class="main-section__text-link">
                <?= GetMessage("COACHES_LIST_SECTION_LINK"); ?> <i class="fa-solid fa-angle-right"></i>
            </a>
        </div>
        <?php
        $GLOBALS['coachesFilter'] = array('ID' => $att_coaches_list);

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "coaches_list",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "FILTER_NAME" => "coachesFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "6",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "10",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "??????????????",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("ATT_RANK", "ATT_ACHIEVMENTS", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "TAG_LIST" => "",
                "TAG_TITLE" => "3"
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</section>
<?php endif; ?>
<?php
if ($arResult["DISPLAY_PROPERTIES"]["ATT_GEO"]["VALUE"]): ?>
<section class="main-section map-section">
    <div class="container">
        <h2 class="main-section__title"><?= $arResult["NAME"]; ?> - <?= GetMessage("MAP_SECTION_TITLE"); ?></h2>
        <?php
        $param_yandex_api_key = $arParams["YANDEX_API_KEY"] ?? '';
        if (!$param_yandex_api_key) {
            echo GetMessage("yandex_error_message");
        } else {
            $this->addExternalJS("https://api-maps.yandex.ru/2.1/?apikey=" . $param_yandex_api_key . "&lang=ru_RU");
        }
        ?>
        <div id="halls-detail-map" class="yandex-map halls-detail-map"></div>
        <script>
            ymaps.ready(init);

            function init() {
                const hallMap = new ymaps.Map("halls-detail-map", {
                        center: [<?= $arResult["DISPLAY_PROPERTIES"]["ATT_GEO"]["VALUE"]; ?>],
                        zoom: 16,
                    }),

                    <?php
                    $balloon_content_header = '<div class="yandex-map__link">' . $arResult["NAME"] .'</div>';
                    if ($arResult["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"]) {
                        $balloon_content_header .= '<div class="yandex-map__set-open">' . $arResult["SET_OPEN_TEXT"] . '</div>';
                    }
                    $balloon_content_header = str_replace(PHP_EOL, '', $balloon_content_header);

                    $balloon_content_body = '';
                    if ($att_address) {
                        $balloon_content_body .= '
                            <div class="yandex-map__address">
                                <i class="yandex-map__address-icon fa-solid fa-location-dot"></i>
                                <div class="yandex-map__address-text">' . $att_address . '</div>
                            </div>
                            ';
                    }
                    if ($att_phones) {
                        foreach ($att_phones["VALUE"] as $key => $phone_number) {
                            $balloon_content_body .= '
                                <div class="yandex-map__phone-item">
                                    <i class="yandex-map__phone-icon fa-solid fa-phone"></i>
                                    <a href="tel:+7' . $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_TEL"][$key] . '"
                                       class="yandex-map__phone-link">' . $arResult["DISPLAY_PROPERTIES"]["ATT_PHONES"]["PHONE_FORMATTED"][$key] . '</a>
                                ';
                            if ($att_phones["DESCRIPTION"][$key]) {
                                $balloon_content_body .= '
                                    <div class="yandex-map__phone-description">(' . $att_phones["DESCRIPTION"][$key] . ')</div>
                                </div>
                                ';
                            } else {
                                $balloon_content_body .= '</div>';
                            }
                        }
                    }
                    $balloon_content_body .= '
                        <a href="#halls-form" class="btn btn-primary btn-sm yandex-map__btn">
                            <i class="fa-solid fa-pencil"></i>' . GetMessage("MAP_SECTION_BTN_TEXT") . '
                        </a>
                        ';
                    $balloon_content_body = str_replace(PHP_EOL, '', $balloon_content_body);
                    ?>

                    hallPlacemark = new ymaps.Placemark([<?= $arResult["DISPLAY_PROPERTIES"]["ATT_GEO"]["VALUE"]; ?>], {
                        balloonContentHeader: '<div class="yandex-map__header"><?= $balloon_content_header; ?></div>',
                        balloonContentBody: '<div class="yandex-map__content"><?= $balloon_content_body; ?></div>',
                        hintContent: "<?= $arResult["NAME"]; ?>",
                    }, {
                        iconLayout: 'default#image',
                        iconImageHref: '<?= SITE_TEMPLATE_PATH; ?>/img/pin.png',
                        iconImageSize: [48, 64],
                        iconImageOffset: [-24, -64],
                    });

                hallMap.geoObjects.add(hallPlacemark);
                hallPlacemark.balloon.open();
            }
        </script>
    </div>
</section>
<?php endif; ?>
