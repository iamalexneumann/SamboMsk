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
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$att_address = $arResult['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE'];
$att_phones = $arResult['DISPLAY_PROPERTIES']['ATT_PHONES'];
$att_features = $arResult['DISPLAY_PROPERTIES']['ATT_FEATURES'];
$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'] ?? '';
$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'] ?? '';
$att_coaches_list = $arResult['DISPLAY_PROPERTIES']['ATT_COACHES_LIST']['VALUE'] ?? '';
$att_contacts_photos = $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_PHOTOS'] ?? '';
$att_contacts_video = $arResult['DISPLAY_PROPERTIES']['ATT_CONTACTS_VIDEO'] ?? '';
?>
<div class="first-screen"
    <?php if ($arResult['PICTURE']): ?> style="background: linear-gradient(90deg, #00369E 0%, rgba(6, 82, 221, 0) 85%),
            url(<?= $arResult['PICTURE']['SRC']; ?>) 50% 50%; background-size: cover;"<?php endif; ?>>
    <div class="container first-screen__container">
        <div class="first-screen__wrapper">
            <header class="first-screen__header">
                <div class="first-screen__title"><?= $arResult['NAME']; ?></div>
                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SET_OPEN']['VALUE']): ?>
                <div class="first-screen__open-text"><?= $arResult['SET_OPEN_TEXT']; ?></div>
                <?php endif; ?>
            </header>
            <nav class="first-screen__nav">
                <ul class="first-screen__ul">
                    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['~VALUE']): ?>
                    <li class="first-screen__li">
                        <a href="#price" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_PRICE'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SCHEDULE']['~VALUE']): ?>
                    <li class="first-screen__li">
                        <a href="#schedule" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_SCHEDULE'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_REVIEWS']['~VALUE']): ?>
                    <li class="first-screen__li">
                        <a href="#reviews" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_REVIEWS'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_YANDEX_MAP']['~VALUE']): ?>
                    <li class="first-screen__li">
                        <a href="#contacts" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_CONTACTS'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($att_photos): ?>
                    <li class="first-screen__li">
                        <a href="#photos" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_PHOTOS'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($att_videos): ?>
                    <li class="first-screen__li">
                        <a href="#videos" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_VIDEOS'); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if ($att_coaches_list): ?>
                    <li class="first-screen__li">
                        <a href="#coaches" class="first-screen__link"><?= Loc::getMessage('HALLS_DETAIL_MAIN_NAV_COACHES'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php if ($att_features): ?>
            <ul class="screen-features">
                <?php foreach ($att_features['VALUE'] as $key => $feature_title): ?>
                <li class="screen-features__item">
                    <?php if ($att_features['~DESCRIPTION'][$key]): ?>
                    <div class="screen-features__icon"><?= $att_features['~DESCRIPTION'][$key]; ?></div>
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
                    <?php foreach ($att_phones['VALUE'] as $key => $phone_number): ?>
                    <div class="screen-phones__item">
                        <i class="screen-phones__icon fa-solid fa-phone"></i>
                        <a href="tel:+7<?= $arResult['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_TEL'][$key]; ?>"
                           class="screen-phones__link"
                           onclick="ym(56418265,'reachGoal','all_phone_link'); return true;"><?= $arResult['DISPLAY_PROPERTIES']['ATT_PHONES']['PHONE_FORMATTED'][$key]; ?></a>
                        <?php if ($att_phones['DESCRIPTION'][$key]): ?>
                        <div class="screen-phones__description">(<?= $att_phones['DESCRIPTION'][$key]; ?>)</div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </footer>
        </div>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_features.php'); ?>

<?php if ($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
<div class="main-section pb-0">
    <div class="container">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</div>
<?php endif; ?>

<?php if ($arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['~VALUE']): ?>
<section class="main-section" id="price">
    <div class="container text-center">
        <h2 class="main-section__title"><?= Loc::getMessage('HALLS_DETAIL_PRICE_SECTION_TITLE'); ?></h2>
        <?php
        $GLOBALS['CAPTION_PRICE_TABLE'] = $arResult['NAME'] . ' - ' . mb_strtolower(Loc::getMessage('HALLS_DETAIL_PRICE_SECTION_TITLE'));
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</section>
<?php endif; ?>

<?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SCHEDULE']['~VALUE']): ?>
<section class="main-section schedule-section" id="schedule">
    <div class="container">
        <h2 class="main-section__title"><?= Loc::getMessage('HALLS_DETAIL_SCHEDULE_SECTION_TITLE'); ?></h2>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <?php
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_SCHEDULE']['~VALUE'],
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

<?php if ($arResult['DISPLAY_PROPERTIES']['ATT_REVIEWS']['~VALUE']): ?>
<section class="main-section" id="reviews">
    <div class="container">
        <h2 class="main-section__title"><?= $arResult['NAME']; ?> - <?= Loc::getMessage('HALLS_REVIEWS_SECTION_TITLE'); ?></h2>
        <div class="row">
            <div class="offset-xl-3 col-xl-6">
                <?= $arResult['DISPLAY_PROPERTIES']['ATT_REVIEWS']['~VALUE']['TEXT']; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($arResult['DISPLAY_PROPERTIES']['ATT_YANDEX_MAP']['~VALUE']): ?>
<section class="main-section map-section" id="contacts">
    <div class="container">
        <h2 class="main-section__title"><?= $arResult['NAME']; ?> - <?= Loc::getMessage('HALLS_DETAIL_MAP_SECTION_TITLE'); ?></h2>
        <?= $arResult['DISPLAY_PROPERTIES']['ATT_YANDEX_MAP']['~VALUE']; ?>
        <?php
        if ($arResult['ATT_CONTACTS_PHOTOS_COUNT'] > 1 || $att_contacts_video):
            $att_contacts_section_title = Loc::getMessage('HALLS_DETAIL_SECTION_CONTACTS_TITLE') .
                ' ' .
                custom_lcfirst($arResult['NAME']);
            ?>
        <div class="section-contacts">
            <h3 class="section-contacts__title"><?= $att_contacts_section_title; ?></h3>
            <div class="row section-contacts__row">
                <?php if ($arResult['ATT_CONTACTS_PHOTOS_COUNT'] > 1):  ?>
                <figure role="group" class="<?php if ($att_contacts_video): ?>col-lg-6<?php else: ?>col<?php endif; ?> photos-list photos-list_contacts">
                    <div class="row">
                        <?php
                        foreach ($att_contacts_photos['VALUE'] as $key => $att_contacts_photo):
                            $att_contacts_photo_description = $att_contacts_photos['DESCRIPTION'][$key] ?? '';
                            ?>
                        <div class="col-6<?php if ((!$att_contacts_video)): ?> col-lg-3<?php endif; ?> photos-list__col">
                            <figure class="photos-list__item">
                                <a href="<?= $att_contacts_photos['FILE_VALUE'][$key]['SRC'] ?: $att_contacts_photos['FILE_VALUE']['SRC']; ?>"
                                   data-fancybox="contacts-photos-list" class="photos-list__link"
                                    <?php if ($att_contacts_photo_description): ?>
                                    title="<?= $att_contacts_photo_description; ?>"
                                    data-caption="<?= $att_contacts_photo_description; ?>"
                                    <?php endif; ?>>
                                    <img src="<?= $att_contacts_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                                         data-src="<?= $att_contacts_photos['PICTURE'][$key]['SRC']; ?>"
                                         alt="<?= $att_contacts_photo_description; ?>"
                                         class="photos-list__img lazyload blur-up"
                                         width="<?= $att_contacts_photos['PICTURE'][$key]['WIDTH']; ?>"
                                         height="<?= $att_contacts_photos['PICTURE'][$key]['HEIGHT']; ?>">
                                </a>
                                <?php if ($att_contacts_photo_description): ?>
                                <figcaption class="photos-list__item-figcaption"><?= $att_contacts_photo_description; ?></figcaption>
                                <?php endif; ?>
                            </figure>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <figcaption class="photos-list__main-figcaption"><?= $att_contacts_section_title . ' - ' . Loc::getMessage('HALLS_DETAIL_SECTION_CONTACTS_PHOTOS_FIGCAPTION'); ?></figcaption>
                </figure>
                <?php endif; ?>
                <?php
                if ($att_contacts_video):
                    $att_contacts_video_description = $att_contacts_section_title .
                        ' - ' .
                        Loc::getMessage('HALLS_DETAIL_SECTION_CONTACTS_VIDEO_FIGCAPTION');
                    ?>
                    <div class="col-lg-6<?php if ($arResult['ATT_CONTACTS_PHOTOS_COUNT'] < 1): ?> offset-lg-3<?php endif; ?> section-contacts__col">
                        <figure class="section-contacts__video contacts-video">
                            <div class="adaptive-video-container">
                                <iframe data-src="https://www.youtube.com/embed/<?= $att_contacts_video['YOUTUBE_ID']; ?>" class="lazyload contacts-video__iframe"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        title="<?= $att_contacts_video_description; ?>"
                                        allowfullscreen></iframe>
                            </div>
                            <figcaption class="contacts-video__figcaption"><?= $att_contacts_video_description; ?></figcaption>
                        </figure>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($arResult['ATT_PHOTOS_COUNT'] > 1):  ?>
<figure role="group" class="photos-list main-section d-flex flex-column-reverse" id="photos">
    <div class="container">
        <div class="row photos-list__row">
            <?php
            foreach ($att_photos['VALUE'] as $key => $att_photo):
                $att_photo_description = $att_photos['DESCRIPTION'][$key] ?? '';
            ?>
            <div class="col-lg-4 col-6 photos-list__col">
                <figure class="photos-list__item">
                    <a href="<?= $att_photos['FILE_VALUE'][$key]['SRC'] ?: $att_photos['FILE_VALUE']['SRC']; ?>"
                       data-fancybox="photos-list" class="photos-list__link"
                        <?php if ($att_photo_description): ?>
                        title="<?= $att_photo_description; ?>"
                        data-caption="<?= $att_photo_description; ?>"
                        <?php endif; ?>>
                        <img src="<?= $att_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                             data-src="<?= $att_photos['PICTURE'][$key]['SRC']; ?>"
                             alt="<?= $att_photo_description; ?>"
                             class="photos-list__img lazyload blur-up"
                             width="<?= $att_photos['PICTURE'][$key]['WIDTH']; ?>"
                             height="<?= $att_photos['PICTURE'][$key]['HEIGHT']; ?>">
                    </a>
                    <?php if ($att_photo_description): ?>
                    <figcaption class="photos-list__item-figcaption"><?= $att_photo_description; ?></figcaption>
                    <?php endif; ?>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <figcaption class="photos-list__main-figcaption main-section__title container"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('HALLS_DETAIL_PHOTOS_FIGCAPTION_TEXT'); ?></figcaption>
</figure>
<?php endif; ?>

<?php if ($att_videos): ?>
<figure role="group" class="videos-list main-section d-flex flex-column-reverse" id="videos">
    <div class="container">
        <div class="row videos-list__row">
            <?php
            foreach ($att_videos['VALUE'] as $key => $att_video):
                $att_video_description = $att_videos['DESCRIPTION'][$key] ?? '';
            ?>
            <div class="col-lg-6 videos-list__col">
                <figure class="videos-list__item">
                    <div class="adaptive-video-container">
                        <iframe data-src="https://www.youtube.com/embed/<?= $att_videos['YOUTUBE_ID'][$key]; ?>" class="lazyload"
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
    <figcaption class="videos-list__main-figcaption main-section__title container"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('HALLS_DETAIL_VIDEOS_FIGCAPTION_TEXT'); ?></figcaption>
</figure>
<?php endif; ?>

<?php if ($att_coaches_list): ?>
<section class="main-section" id="coaches">
    <div class="container">
        <h2 class="main-section__title"><?= Loc::getMessage('HALLS_DETAIL_COACHES_SECTION_TITLE'); ?></h2>
        <div class="main-section__subtitle"><?= Loc::getMessage('HALLS_DETAIL_COACHES_SECTION_SUBTITLE'); ?></div>
        <div class="main-section__text-link-wrapper">
            <a href="/o-nas/trenery/" class="main-section__text-link">
                <?= Loc::getMessage('HALLS_DETAIL_COACHES_SECTION_LINK_TEXT'); ?> <i class="fa-solid fa-angle-right"></i>
            </a>
        </div>
        <?php
        $GLOBALS['COACHES_FILTER'] = ['ID' => $att_coaches_list];

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
                "FILTER_NAME" => "COACHES_FILTER",
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
                "PAGER_TITLE" => "Тренеры",
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


