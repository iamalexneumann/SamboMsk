<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
$param_list_tag = $arParams["TAG_LIST"] ?? '';
?>
<div class="coaches-list">
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
                BX_RESIZE_IMAGE_EXACT
            );
            $att_rank = $arItem["DISPLAY_PROPERTIES"]["ATT_RANK"]["VALUE"];
            $att_birthday = $arItem["DISPLAY_PROPERTIES"]["ATT_BIRTHDAY"]["VALUE"];
            if ($att_birthday) {
                $att_birthday_year = FormatDate('Y', strtotime($att_birthday));
            }
            $att_achievments = $arItem["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"];
            ?>
            <div class="col-lg-6 coaches-list__col">
                <article class="coach" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="coach__img-link" rel="nofollow">
                        <img src="<?= $article_img["src"]; ?>"
                             class="coach__img"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $article_img_width; ?>"
                             height="<?= $article_img_height; ?>">
                    </a>
                    <div class="coach__wrapper">
                        <header class="coach__header">
                            <h<?= $param_tag_title; ?> class="coach__title">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="coach__link"><?= $arItem["NAME"]; ?></a>
                            </h<?= $param_tag_title; ?>>
                            <?php if ($att_birthday_year): ?>
                            <div class="coach__age">
                                <?= get_age(
                                        $att_birthday_year,
                                        GetMessage('age_declension_one'),
                                        GetMessage('age_declension_four'),
                                        GetMessage('age_declension_five')
                                ); ?>
                            </div>
                            <?php endif; ?>
                        </header>
                        <?php if ($att_achievments || $att_rank): ?>
                        <div class="coach__achievments">
                            <?php if ($att_rank): ?>
                            <div class="coach__rank">
                                <div class="coach__rank-icon">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                                <div class="coach__rank-text">
                                    <?= $att_rank; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                            if ($att_achievments) {
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
                            }
                            ?>
                        </div>
                        <?php endif; ?>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="btn btn-primary coach__btn" rel="nofollow">
                            <?= GetMessage("btn_text"); ?> <i class="fa-solid fa-angle-right coach__btn-icon"></i>
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
