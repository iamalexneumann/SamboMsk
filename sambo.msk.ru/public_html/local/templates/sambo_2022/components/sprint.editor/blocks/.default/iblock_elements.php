<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);

$elements = Sprint\Editor\Blocks\IblockElements::getList(
    $block,
    [
        'NAME',
        'DETAIL_PAGE_URL',
    ]
);
?>
<div class="mt-5">
    <div class="h6 mb-3"><?= Loc::getMessage('IBLOCK_ELEMENTS_TITLE'); ?></div>
    <ul class="custom-ul-list">
        <?php foreach ($elements as $aItem): ?>
        <li>
            <a href="<?= $aItem['DETAIL_PAGE_URL'] ?>"><?= $aItem['NAME'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
