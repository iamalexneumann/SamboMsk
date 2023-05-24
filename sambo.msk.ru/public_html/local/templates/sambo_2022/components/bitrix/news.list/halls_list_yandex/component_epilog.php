<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var string $epilogFile
 * @var array $templateData
 * @var CBitrixComponent $component
 */
use Bitrix\Main\Localization\Loc;

$param_map_center = $arParams['MAP_CENTER'] ?? '55.76, 37.64';
$param_map_zoom = $arParams['MAP_ZOOM'] ?? '10';
?>
<script>
    ymaps.ready(init);
    function init() {
        const hallsMap = new ymaps.Map("halls-list-map", {
                center: [<?= $param_map_center; ?>],
                zoom: <?= $param_map_zoom; ?>
            }),
            <?php
            $placemarks = [];
            foreach ($arResult['ITEMS'] as $key_item => $arItem):
                $att_geo = $arItem['DISPLAY_PROPERTIES']['ATT_GEO']['VALUE'];
                if ($att_geo):
                    $placemark_name = \CUtil::translit(
                        $arItem['NAME'],
                        'ru',
                        [
                            'replace_space'=>'',
                            'replace_other'=>''
                        ]
                    );
                    array_push($placemarks, $placemark_name);
                    $att_phones = $arItem['DISPLAY_PROPERTIES']['ATT_PHONES'];

                    $balloon_content_header = '<a href="' . $arItem['DETAIL_PAGE_URL'] . '" class="yandex-map__link">' . $arItem['NAME'] .'</a>';
//                    $balloon_content_header .= '<div class="yandex-map__set-open">' . $arItem['SET_OPEN_TEXT'] . '</div>';
                    $balloon_content_header = str_replace(PHP_EOL, '', $balloon_content_header);

//                    $balloon_content_body = '
//                        <a href="' . $arItem['DETAIL_PAGE_URL'] . '" class="yandex-map__img-link">
//                            <img src="' . $arItem['PICTURE']['SRC'] . '" class="yandex-map__img" alt="">
//                        </a>
//                        ';
                    if ($arItem['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE']) {
                        $balloon_content_body = '
                            <div class="yandex-map__address">
                                <i class="yandex-map__address-icon fa-solid fa-location-dot"></i>
                                <div class="yandex-map__address-text">' . $arItem['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE'] . '</div>
                            </div>
                            ';
                    }
                    if ($att_phones) {
                        foreach ($att_phones['VALUE'] as $key => $phone_number) {
                            $balloon_content_body .= '
                                <div class="yandex-map__phone-item">
                                    <i class="yandex-map__phone-icon fa-solid fa-phone"></i>
                                    <a href="tel:+7' . $arItem['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_TEL'][$key] . '"
                                       class="yandex-map__phone-link">' . $arItem['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_FORMATTED'][$key] . '</a>
                                ';
                            if ($att_phones['DESCRIPTION'][$key]) {
                                $balloon_content_body .= '
                                        <div class="yandex-map__phone-description">(' . $att_phones['DESCRIPTION'][$key] . ')</div>
                                    </div>
                                    ';
                            } else {
                                $balloon_content_body .= '</div>';
                            }
                        }
                    }
                    $balloon_content_body .= '
                        <a href="' . $arItem['DETAIL_PAGE_URL'] .'" class="btn btn-primary btn-sm yandex-map__btn">
                            ' . Loc::getMessage('HALLS_LIST_YANDEX_MORE_BTN_TEXT') . ' <i class="fa-solid fa-angle-right hall__btn-icon"></i>
                        </a>
                        ';
                    $balloon_content_body = str_replace(PHP_EOL, '', $balloon_content_body);
            ?>
            <?= $placemark_name; ?>Placemark = new ymaps.Placemark([<?= $att_geo; ?>], {
                balloonContentHeader: '<div class="yandex-map__header"><?= $balloon_content_header; ?></div>',
                balloonContentBody: '<div class="yandex-map__content"><?= $balloon_content_body; ?></div>',
                hintContent: "<?= $arItem['NAME']; ?>",
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