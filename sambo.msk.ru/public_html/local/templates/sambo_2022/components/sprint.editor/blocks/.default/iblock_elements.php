<?php /** @var $block array */ ?>
<?php
$elements = Sprint\Editor\Blocks\IblockElements::getList(
    $block,
    [
        'NAME',
        'DETAIL_PAGE_URL',
    ]
);
?>
<div class="mt-5">
    <div class="h2">Статьи по этой теме:</div>
    <ul class="custom-ul-list">
        <?php foreach ($elements as $aItem): ?>
        <li>
            <a href="<?= $aItem['DETAIL_PAGE_URL'] ?>"><?= $aItem['NAME'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
