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

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'] ?? '';
$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'] ?? '';
?>
<div class="coach-detail main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-5 coach-detail__img-wrapper">
                <a href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" class="coach-detail__img-link"
                   data-fancybox="coach-photos-list" title="<?= $arResult['NAME']; ?>">
                    <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                         data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                         class="coach-detail__img lazyload blur-up"
                         alt="<?= $arResult['NAME']; ?>"
                         width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                         height="<?= $arResult['PICTURE']['HEIGHT']; ?>">
                </a>
            </div>
            <div class="col-md-7 coach-detail__content-wrapper">
                <?php if($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
                <div class="mb-5">
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
                    );
                    ?>
                </div>
                <?php endif; ?>
                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_BIRTHDAY']['VALUE']): ?>
                <div class="coach__age">
                    <span class="coach__age-date">
                        <span><?= Loc::getMessage('COACH_DETAIL_BITRHDAY_TEXT'); ?>:</span>
                        <?= $arResult['BIRHTDAY_FORMATTED']; ?> <?= Loc::getMessage('COACH_DETAIL_YEAR_TEXT'); ?>
                    </span>
                    <span class="coach__age-description">(<?= $arResult['AGE']; ?>)</span>
                </div>
                <?php endif; ?>
                <div class="coach__achievments">
                    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_RANK']['VALUE']): ?>
                    <div class="coach__rank">
                        <div class="coach__rank-icon">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="coach__rank-text">
                            <?= $arResult['DISPLAY_PROPERTIES']['ATT_RANK']['VALUE']; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                    if ($arResult['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE']) {
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE'],
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
    </div>

    <?php if ($att_photos): ?>
    <figure role="group" class="photos-list main-section d-flex flex-column-reverse">
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
        <figcaption class="photos-list__main-figcaption main-section__title container"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('COACH_DETAIL_PHOTOS_FIGCAPTION_TEXT'); ?></figcaption>
    </figure>
    <?php endif; ?>

    <?php if ($att_videos): ?>
    <figure role="group" class="videos-list main-section d-flex flex-column-reverse">
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
        <figcaption class="videos-list__main-figcaption main-section__title container"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('COACH_DETAIL_VIDEOS_FIGCAPTION_TEXT'); ?></figcaption>
    </figure>
    <?php endif; ?>
</div>