<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 */

use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<div class="share-block">
    <div class="share-block__title"><?= Loc::getMessage('BLOCK_SHARE_TITLE'); ?></div>
    <div class="share-block__description"><?= Loc::getMessage('BLOCK_SHARE_SUBTITLE'); ?></div>
    <div class="share-block__widget">
        <script src="https://yastatic.net/share2/share.js"></script>
        <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp"></div>
    </div>
    <?php if ($arResult['FOLDER']): ?>
    <a href="<?= $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['news']; ?>"
       class="btn btn-primary share-block__btn">
        <i class="fa-solid fa-angle-left share-block__btn-icon"></i> <?= Loc::getMessage('BLOCK_SHARE_LIST_BTN_TEXT'); ?>
    </a>
    <?php endif; ?>
</div>