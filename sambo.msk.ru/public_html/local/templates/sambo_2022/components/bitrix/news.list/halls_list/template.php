<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
$param_list_tag = $arParams["TAG_LIST"] ?? '';
?>
<div class="halls-list">
    <div class="row">
        <?php
        foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $article_img_width = 635;
            $article_img_height = 400;
            $article_img = CFile::ResizeImageGet(
                $arItem["PREVIEW_PICTURE"],
                [
                    "width" => $article_img_width,
                    "height" => $article_img_height
                ],
                BX_RESIZE_IMAGE_EXACT
            );
            $article_img_lqip = CFile::ResizeImageGet(
                $arItem["PREVIEW_PICTURE"],
                [
                    "width" => 100,
                    "height" => 100
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );
            $att_set_open = $arItem["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"];
            $att_address = $arItem["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"];
            $att_phones = $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"];
            $att_features = $arItem["DISPLAY_PROPERTIES"]["ATT_FEATURES"];
            ?>
            <div class="col-lg-6 halls-list__col">
                <article class="hall" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="hall__img-link" rel="nofollow">
                        <img src="<?= $article_img_lqip["src"];?>"
                             data-src="<?= $article_img["src"]; ?>"
                             class="hall__img lazyload blur-up"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $article_img_width; ?>"
                             height="<?= $article_img_height; ?>">
                    </a>
                    <div class="hall__wrapper">
                        <header class="hall__header">
                            <h<?= $param_tag_title; ?> class="hall__title">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="hall__link"><?= $arItem["NAME"]; ?></a>
                            </h<?= $param_tag_title; ?>>
                            <?php if ($att_set_open): ?>
                            <div class="set-open">
                                <div class="set-open__icons set-open__icons_<?php if ($att_set_open === 'Да'): ?>open<?php else: ?>closed<?php endif; ?>">
                                    <?php
                                    $circle_count = 3;
                                    for ($i = 1; $i <= $circle_count; $i++) {
                                        if (($i === $circle_count) && ($att_set_open === 'Да')) {
                                            echo '<i class="set-open__icon fa-solid fa-circle-half-stroke"></i>';
                                        } else {
                                            echo '<i class="set-open__icon fa-solid fa-circle"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="set-open__text">
                                    <?php
                                    if ($att_set_open === 'Да') {
                                        echo GetMessage("set_open_text_open");
                                    } else {
                                        echo GetMessage("set_open_text_closed");
                                    } ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </header>
                        <?php if ($att_features): ?>
                        <ul class="hall__features">
                            <?php
                            foreach ($att_features["~VALUE"] as $key => $feature_icon):
                                $feature_description = $att_features["DESCRIPTION"][$key];
                                ?>
                                <li class="hall__feature-item">
                                    <div class="hall__feature-icon"><?= $feature_icon; ?></div>
                                    <?php if ($feature_description): ?>
                                    <div class="hall__feature-description"><?= $feature_description; ?></div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <footer class="hall__footer">
                            <?php if ($att_address): ?>
                            <div class="hall__address">
                                <i class="hall__address-icon fa-solid fa-location-dot"></i>
                                <div class="hall__address-text"><?= $att_address; ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($att_phones): ?>
                            <div class="hall__phones">
                                <?php
                                foreach ($att_phones["VALUE"] as $key => $phone_number):
                                    $phone_description = $att_phones["DESCRIPTION"][$key];
                                ?>
                                <div class="hall__phone-item">
                                    <i class="hall__phone-icon fa-solid fa-phone"></i>
                                    <a href="tel:+7<?= clear_symbols_in_phone_number(substr($phone_number, 1)); ?>"
                                       class="hall__phone-link"
                                       onclick="ym(56418265, 'reachGoal', '7<?= clear_symbols_in_phone_number(substr($phone_number, 1)); ?>'); return true;">+7 <?= substr($phone_number, 1); ?></a>
                                    <?php if ($phone_description): ?>
                                    <div class="hall__phone-description">(<?= $phone_description; ?>)</div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </footer>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="btn btn-primary hall__btn" rel="nofollow">
                            <?= GetMessage("btn_text"); ?> <i class="fa-solid fa-angle-right hall__btn-icon"></i>
                        </a>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
if($arParams["DISPLAY_BOTTOM_PAGER"]) {
    echo $arResult["NAV_STRING"];
}
?>
