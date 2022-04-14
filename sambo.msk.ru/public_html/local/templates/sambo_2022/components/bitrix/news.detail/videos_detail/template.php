<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
$att_videos = $arResult["DISPLAY_PROPERTIES"]["ATT_VIDEOS"] ?? '';
?>
<div class="videos-detail">
    <?php if($arResult["DETAIL_TEXT"] <> ''): ?>
    <div class="videos-detail__text">
        <?= $arResult["DETAIL_TEXT"]; ?>
    </div>
    <?php endif; ?>
    <?php
    if (count($att_videos) > 0):
        $this->addExternalCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
        $this->addExternalJS(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
        ?>
        <figure role="group" class="videos-list">
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
            <figcaption class="videos-list__main-figcaption"><?= $arResult["NAME"] . ' - ' . GetMessage("MAIN_FIGCAPTION_TEXT"); ?></figcaption>
        </figure>
    <?php endif; ?>
</div>