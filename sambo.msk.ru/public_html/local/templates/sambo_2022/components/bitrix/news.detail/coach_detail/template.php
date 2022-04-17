<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
$att_photos = $arResult["DISPLAY_PROPERTIES"]["photos"] ?? '';
$att_videos = $arResult["DISPLAY_PROPERTIES"]["videos"] ?? '';
$coach_photo_width = 660;
$coach_photo_height = 1000;
$coach_photo = CFile::ResizeImageGet(
    $arResult["DETAIL_PICTURE"],
    [
        'width' => $coach_photo_width,
        'height' => $coach_photo_height
    ],
    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
);
$att_rank = $arResult["DISPLAY_PROPERTIES"]["ATT_RANK"]["VALUE"];
$att_birthday = $arResult["DISPLAY_PROPERTIES"]["ATT_BIRTHDAY"]["VALUE"];
if ($att_birthday) {
    $att_birthday_year = FormatDate('Y', strtotime($att_birthday));
}
$att_achievments = $arResult["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"];
?>
<div class="coach-detail">
    <div class="row">
        <div class="col-md-5 coach-detail__img-wrapper">
            <a href="<?= $arResult["DETAIL_PICTURE"]["SRC"]; ?>" class="coach-detail__img-link"
               data-fancybox="coach-photos-list" title="<?= $arResult["NAME"]; ?>">
                <img src="<?= $coach_photo["src"]; ?>" alt="<?= $arResult["NAME"]; ?>" class="coach-detail__img"
                     width="<?= $coach_photo_width; ?>" height="<?= $coach_photo_height; ?>">
            </a>
        </div>
        <div class="col-md-7 coach-detail__content-wrapper">
            <?php if($arResult["DETAIL_TEXT"] <> ''): ?>
            <div class="coach-detail__text">
                <?= $arResult["DETAIL_TEXT"]; ?>
            </div>
            <?php endif; ?>
<!--            --><?php //if ($att_birthday_year): ?>
<!--            <div class="coach__age">-->
<!--                --><?//= get_age(
//                    $att_birthday_year,
//                    GetMessage('age_declension_one'),
//                    GetMessage('age_declension_four'),
//                    GetMessage('age_declension_five')
//                ); ?>
<!--            </div>-->
<!--            --><?php //endif; ?>
            <div class="coach__achievments">
                <?php if ($att_rank): ?>
                    <div class="coach__rank">
                        <div class="coach__rank-icon">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="coach__rank-text">
                            <?= $att_rank; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                if ($att_achievments) {
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $att_achievments,
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (count($att_photos) > 0):
        $this->addExternalCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
        $this->addExternalJS(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
        ?>
        <figure role="group" class="photos-list main-section d-flex flex-column-reverse">
            <div class="row photos-list__row">
            <?php
            foreach($att_photos['VALUE'] as $arItemKey => $att_photo):
                $att_photo_width = 500;
                $att_photo_height = 500;
                $att_photo = CFile::ResizeImageGet(
                    $att_photo,
                    [
                        'width' => $att_photo_width,
                        'height' => $att_photo_height
                    ],
                    BX_RESIZE_IMAGE_EXACT
                );
                $att_photo_description = $att_photos['DESCRIPTION'][$arItemKey] ?? '';
                $att_photo_src = $att_photos['FILE_VALUE'][$arItemKey]['SRC'];
                ?>
                <div class="col-lg-4 col-6 photos-list__col">
                    <figure class="photos-list__item">
                        <a href="<?= $att_photo_src; ?>" data-fancybox="photos-list" class="photos-list__link"
                            <?php if ($att_photo_description): ?>
                                title="<?= $att_photo_description; ?>"
                                data-caption="<?= $att_photo_description; ?>"
                            <?php endif; ?>>
                            <img src="<?= $att_photo['src']; ?>" alt="<?= $att_photo_description; ?>" class="photos-list__img"
                                 width="<?= $att_photo_width; ?>" height="<?= $att_photo_height; ?>">
                        </a>
                        <?php if ($att_photo_description): ?>
                        <figcaption class="photos-list__item-figcaption"><?= $att_photo_description; ?></figcaption>
                        <?php endif; ?>
                    </figure>
                </div>
            <?php endforeach; ?>
            </div>
            <figcaption class="photos-list__main-figcaption main-section__title"><?= $arResult["NAME"] . ' - ' . GetMessage("PHOTO_FIGCAPTION_TEXT"); ?></figcaption>
        </figure>
    <?php endif; ?>
    <?php if (count($att_videos) > 0): ?>
        <figure role="group" class="videos-list main-section d-flex flex-column-reverse">
            <div class="row videos-list__row">
                <?php
                foreach($att_videos['VALUE'] as $arItemKey => $att_video):
                    $att_video_description = $att_videos['DESCRIPTION'][$arItemKey] ?? '';
                    $att_video_src = $att_videos['FILE_VALUE'][$arItemKey]['SRC'];
                    ?>
                    <div class="col-lg-6 videos-list__col">
                        <figure class="videos-list__item">
                            <div class="adaptive-video-container">
                                <iframe src="https://www.youtube.com/embed/<?= get_youtube_id($att_video); ?>"
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
            <figcaption class="videos-list__main-figcaption main-section__title"><?= $arResult["NAME"] . ' - ' . GetMessage("VIDEO_FIGCAPTION_TEXT"); ?></figcaption>
        </figure>
    <?php endif; ?>
</div>