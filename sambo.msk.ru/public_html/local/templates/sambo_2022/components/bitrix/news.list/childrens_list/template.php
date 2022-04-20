<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
?>
<?php if (count($arResult['ITEMS']) > 0):
        $this->addExternalCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
        $this->addExternalJS(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
?>
<div class="childrens-list">
    <div class="row">
        <?php
        foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $article_img_width = 450;
            $article_img_height = 675;
            $article_img = CFile::ResizeImageGet(
                $arItem["PREVIEW_PICTURE"],
                [
                    "width" => $article_img_width,
                    "height" => $article_img_height
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );
            $att_year = $arItem["DISPLAY_PROPERTIES"]["ATT_YEAR"]["VALUE"];
            $att_victories = $arItem["DISPLAY_PROPERTIES"]["ATT_VICTORIES"]["VALUE"];
            $att_defeat = $arItem["DISPLAY_PROPERTIES"]["ATT_DEFEAT"]["VALUE"];
            $att_achievments = $arItem["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"];
            ?>
            <div class="col-lg-6 childrens-list__col">
                <article class="children" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a class="children__img-link" href="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>"
                       data-fancybox="childrens-list"
                       data-caption="<?= $arItem["NAME"]; ?>">
                        <img src="<?= $article_img["src"]; ?>"
                             class="children__img"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $article_img_width; ?>"
                             height="<?= $article_img_height; ?>">
                    </a>
                    <div class="children__wrapper">
                        <header class="children__header">
                            <h<?= $param_tag_title; ?> class="children__title">
                                <?= $arItem["NAME"]; ?>
                            </h<?= $param_tag_title; ?>>
                        </header>
                        <?php if ($att_year): ?>
                        <div class="children__year">
                            <span class="children__year-text"><?= GetMessage("NEWS_LIST_CHILDRENS_LIST_YEAR_TEXT"); ?></span>:
                            <?= $att_year; ?> <?= GetMessage("NEWS_LIST_CHILDRENS_LIST_YEAR_DECLENSION"); ?>
                        </div>
                        <?php endif; ?>
                        <?php if ($att_victories || $att_defeat): ?>
                        <div class="children__victories-defeat">
                            <div class="children__victories">
                                <span class="children__victories-text"><?= GetMessage("NEWS_LIST_CHILDRENS_LIST_VICTORIES_TEXT"); ?></span>:
                                <?= $att_victories; ?>
                            </div>
                            <div class="children__defeat">
                                <span class="children__defeat-text"><?= GetMessage("NEWS_LIST_CHILDRENS_LIST_DEFEAT_TEXT"); ?></span>:
                                <?= $att_defeat; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($att_achievments): ?>
                        <div class="children__achievments">
                            <div class="children__achievments-title">
                                <?= GetMessage("NEWS_LIST_CHILDRENS_LIST_ACHIEVMENTS_TEXT"); ?>:
                            </div>
                            <?php
                            $APPLICATION->IncludeComponent(
                                "sprint.editor:blocks",
                                ".default",
                                Array(
                                    "JSON" => $att_achievments,
                                ),
                                $component,
                                Array(
                                    "HIDE_ICONS" => "Y"
                                )
                            );
                            ?>
                        </div>
                        <?php endif; ?>
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
<?php endif; ?>