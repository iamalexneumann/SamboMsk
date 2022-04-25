<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$this->setFrameMode(true);
?>
<div class="page-news-detail">
    <div class="container">
        <div class="row">
            <?php if($arResult["DETAIL_TEXT"] <> ''): ?>
            <div class="detail-text">
                <?= $arResult["DETAIL_TEXT"]; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
