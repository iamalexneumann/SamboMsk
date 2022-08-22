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

$att_videos = $arResult['DISPLAY_PROPERTIES']['ATT_VIDEOS'] ?? '';
?>
<div class="videos-detail">
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
    <figure role="group" class="videos-list">
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
        <figcaption class="videos-list__main-figcaption"><?= $arResult['NAME'] . ' - ' . Loc::getMessage('VIDEOS_DETAIL_MAIN_FIGCAPTION_TEXT'); ?></figcaption>
    </figure>
</div>