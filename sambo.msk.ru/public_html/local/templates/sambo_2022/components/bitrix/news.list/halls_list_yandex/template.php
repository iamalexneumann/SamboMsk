<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$param_yandex_api_key = $arParams["YANDEX_API_KEY"] ?? '';
if (!$param_yandex_api_key) {
    echo GetMessage("halls_list_yandex_error_message");
} else {
    $this->addExternalJS("https://api-maps.yandex.ru/2.1/?apikey=" . $param_yandex_api_key . "&lang=ru_RU");
}
$this->setFrameMode(true);
$param_map_center = $arParams["MAP_CENTER"] ?? '55.76, 37.64';
$param_map_zoom = $arParams["MAP_ZOOM"] ?? '10';
?>
<div id="halls-list-map" class="yandex-map halls-list-map"></div>
<script>
    ymaps.ready(init);
    function init() {
        const hallsMap = new ymaps.Map("halls-list-map", {
                center: [<?= $param_map_center; ?>],
                zoom: <?= $param_map_zoom; ?>
            }),
            <?php
            $placemarks = [];
            foreach($arResult["ITEMS"] as $key_item => $arItem):
                $att_geo = $arItem["DISPLAY_PROPERTIES"]["ATT_GEO"]["VALUE"];
                if ($att_geo):
                    $placemark_name = CUtil::translit($arItem["NAME"], "ru", array("replace_space"=>"", "replace_other"=>""));
                    array_push($placemarks, $placemark_name);
                    $att_set_open = $arItem["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"];
                    $att_address = $arItem["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"];
                    $att_phones = $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"];
                    $article_img_width = 213;
                    $article_img_height = 120;
                    $article_img = CFile::ResizeImageGet(
                        $arItem["PREVIEW_PICTURE"],
                        [
                            "width" => $article_img_width,
                            "height" => $article_img_height
                        ],
                        BX_RESIZE_IMAGE_EXACT
                    );

                    $balloon_content_header = '<a href="' . $arItem["DETAIL_PAGE_URL"] . '" class="yandex-map__link">' . $arItem["NAME"] .'</a>';
                    if ($att_set_open === 'Да') {
                        $balloon_content_header .= '<div class="yandex-map__set-open">' . GetMessage("set_open_text_open") . '</div>';
                    } else {
                        $balloon_content_header .= '<div class="yandex-map__set-open">' . GetMessage("set_open_text_closed") . '</div>';
                    }
                    $balloon_content_header = str_replace(PHP_EOL, '', $balloon_content_header);

                    $balloon_content_body = '
                        <a href="' . $arItem["DETAIL_PAGE_URL"] . '" class="yandex-map__img-link">
                            <img src="' . $article_img["src"] . '" class="yandex-map__img" alt="">
                        </a>
                        ';
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
                            $phone_description = $att_phones["DESCRIPTION"][$key];
                            $balloon_content_body .= '
                                <div class="yandex-map__phone-item">
                                    <i class="yandex-map__phone-icon fa-solid fa-phone"></i>
                                    <a href="tel:+7' . clear_symbols_in_phone_number(substr($phone_number, 1)) . '"
                                       class="yandex-map__phone-link">+7 ' . substr($phone_number, 1) . '</a>
                                ';
                            if ($phone_description) {
                                $balloon_content_body .= '
                                    <div class="yandex-map__phone-description">(' . $phone_description . ')</div>
                                </div>
                                ';
                            } else {
                                $balloon_content_body .= '</div>';
                            }
                        }
                    }
                    $balloon_content_body .= '
                            <a href="' . $arItem["DETAIL_PAGE_URL"] .'" class="btn btn-primary btn-sm yandex-map__btn">
                                ' . GetMessage("BTN_TEXT") . ' <i class="fa-solid fa-angle-right hall__btn-icon"></i>
                            </a>
                            ';
                    $balloon_content_body = str_replace(PHP_EOL, '', $balloon_content_body);
            ?>
            <?= $placemark_name; ?>Placemark = new ymaps.Placemark([<?= $att_geo; ?>], {
                balloonContentHeader: '<div class="yandex-map__header"><?= $balloon_content_header; ?></div>',
                balloonContentBody: '<div class="yandex-map__content"><?= $balloon_content_body; ?></div>',
                hintContent: "<?= $arItem["NAME"]; ?>",
            }, {
                iconLayout: 'default#image',
                iconImageHref: '<?= SITE_TEMPLATE_PATH; ?>/img/pin.png',
                iconImageSize: [48, 64],
                iconImageOffset: [-24, -64],
            });

        hallsMap.geoObjects.add(<?= $placemark_name; ?>Placemark);
        <?php
            endif;
        endforeach; ?>
        <?= $placemarks[array_rand($placemarks)]; ?>Placemark.balloon.open();
    }
</script>