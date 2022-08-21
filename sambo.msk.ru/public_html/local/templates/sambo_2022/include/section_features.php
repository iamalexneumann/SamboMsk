<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="features-section">
    <div class="container">
        <div class="features-section__title"><?= Loc::getMessage('SECTION_FEATURES_TITLE'); ?></div>
        <ol class="features-list">
            <li class="features-list__item">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/img/features/feature-1.png" class="features-list__item-img"
                     width="52" height="45" alt="<?= Loc::getMessage('SECTION_FEATURES_ITEM1_TITLE'); ?>">
                <div class="features-list__item-text"><?= Loc::getMessage('SECTION_FEATURES_ITEM1_TITLE'); ?></div>
            </li>
            <li class="features-list__item">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/img/features/feature-2.png" class="features-list__item-img"
                     width="46" height="64" alt="<?= Loc::getMessage('SECTION_FEATURES_ITEM2_TITLE'); ?>">
                <div class="features-list__item-text"><?= Loc::getMessage('SECTION_FEATURES_ITEM2_TITLE'); ?></div>
            </li>
            <li class="features-list__item">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/img/features/feature-3.png" class="features-list__item-img"
                     width="43" height="52" alt="<?= Loc::getMessage('SECTION_FEATURES_ITEM3_TITLE'); ?>">
                <div class="features-list__item-text"><?= Loc::getMessage('SECTION_FEATURES_ITEM3_TITLE'); ?></div>
            </li>
            <li class="features-list__item">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/img/features/feature-4.png" class="features-list__item-img"
                     width="50" height="64" alt="<?= Loc::getMessage('SECTION_FEATURES_ITEM4_TITLE'); ?>">
                <div class="features-list__item-text"><?= Loc::getMessage('SECTION_FEATURES_ITEM4_TITLE'); ?></div>
            </li>
        </ol>
    </div>
</div>