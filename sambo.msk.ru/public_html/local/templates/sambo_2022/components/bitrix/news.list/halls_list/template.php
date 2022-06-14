<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent $component
 * @var CMain $APPLICATION
 */
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
$param_list_tag = $arParams["TAG_LIST"] ?? '';
?>
<div class="halls-list">
    <div class="row">
        <?php
        foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $att_phones = $arItem["DISPLAY_PROPERTIES"]["ATT_PHONES"];
            $att_features = $arItem["DISPLAY_PROPERTIES"]["ATT_FEATURES"];
            ?>
            <div class="col-lg-6 halls-list__col">
                <article class="hall" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="hall__img-link" rel="nofollow">
                        <img src="<?= $arItem["PICTURE_LQIP"]["SRC"]; ?>"
                             data-src="<?= $arItem["PICTURE"]["SRC"]; ?>"
                             class="hall__img lazyload blur-up"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $arItem["PICTURE"]["WIDTH"]; ?>"
                             height="<?= $arItem["PICTURE"]["HEIGHT"]; ?>">
                    </a>
                    <div class="hall__wrapper">
                        <header class="hall__header">
                            <h<?= $param_tag_title; ?> class="hall__title">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="hall__link"><?= $arItem["NAME"]; ?></a>
                            </h<?= $param_tag_title; ?>>
                            <?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"]): ?>
                            <div class="set-open">
                                <div class="set-open__icons set-open__icons_<?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_SET_OPEN"]["VALUE"] === 'Да'): ?>open<?php else: ?>closed<?php endif; ?>">
                                    <?= $arItem["SET_OPEN_ICONS"]; ?>
                                </div>
                                <div class="set-open__text">
                                    <?= $arItem["SET_OPEN_TEXT"]; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </header>
                        <?php if ($att_features): ?>
                        <ul class="hall__features">
                            <?php foreach ($att_features["VALUE"] as $key => $feature_title): ?>
                            <li class="hall__feature-item">
                                <?php if ($att_features["~DESCRIPTION"][$key]): ?>
                                <div class="hall__feature-icon"><?= $att_features["~DESCRIPTION"][$key]; ?></div>
                                <?php endif; ?>
                                <div class="hall__feature-description"><?= $feature_title; ?></div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <footer class="hall__footer">
                            <?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"]): ?>
                            <div class="hall__address">
                                <i class="hall__address-icon fa-solid fa-location-dot"></i>
                                <div class="hall__address-text"><?= $arItem["DISPLAY_PROPERTIES"]["ATT_ADDRESS"]["VALUE"]; ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($att_phones): ?>
                            <div class="hall__phones">
                                <?php foreach ($att_phones["VALUE"] as $key => $phone_number): ?>
                                <div class="hall__phone-item">
                                    <i class="hall__phone-icon fa-solid fa-phone"></i>
                                    <a href="tel:+7<?= $att_phones["PHONE_TEL"][$key]; ?>"
                                       class="hall__phone-link"
                                       onclick="ym(56418265, 'reachGoal', '7<?= $att_phones["PHONE_TEL"][$key]; ?>'); return true;"><?= $att_phones["PHONE_FORMATTED"][$key]; ?></a>
                                    <?php if ($att_phones["DESCRIPTION"][$key]): ?>
                                    <div class="hall__phone-description">(<?= $att_phones["DESCRIPTION"][$key]; ?>)</div>
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
if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
    echo $arResult["NAV_STRING"];
}
?>
