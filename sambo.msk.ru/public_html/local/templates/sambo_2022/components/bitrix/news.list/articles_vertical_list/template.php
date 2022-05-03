<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
$param_tag_title = $arParams["TAG_TITLE"] ?? '2';
$param_list_tag = $arParams["TAG_LIST"] ?? '';
?>
<div class="articles-list-vertical<?php if ($param_list_tag): ?> <?= $param_list_tag; ?>-list<?php endif; ?>">
    <div class="row">
        <?php
        foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $article_img_width = 500;
            $article_img_height = 500;
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
            $att_preview_text = $arItem["DISPLAY_PROPERTIES"]["ATT_PREVIEW_TEXT"]["~VALUE"];
            ?>
            <div class="col-lg-4 col-md-6 articles-list-vertical__col">
                <article class="article-vertical <?php if ($param_list_tag): ?> <?= $param_list_tag; ?>-article<?php endif; ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="article-vertical__img-link" rel="nofollow">
                        <img src="<?= $article_img_lqip["src"];?>"
                             data-src="<?= $article_img["src"]; ?>"
                             class="article-vertical__img lazyload blur-up"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $article_img_width; ?>"
                             height="<?= $article_img_height; ?>">
                    </a>
                    <div class="article-vertical__wrapper">
                        <header class="article-vertical__header">
                            <?php if($arParams["DISPLAY_DATE"] !== "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                            <time class="article-vertical__time" datetime="<?= FormatDate('Y-m-d', MakeTimeStamp($arItem["ACTIVE_FROM"])); ?>"><?= $arItem["DISPLAY_ACTIVE_FROM"]; ?> г.</time>
                            <?php endif; ?>
                            <h<?= $param_tag_title; ?> class="article-vertical__title">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="article-vertical__link"><?= $arItem["NAME"]; ?></a>
                            </h<?= $param_tag_title; ?>>
                        </header>
                        <?php if ($att_preview_text): ?>
                        <div class="article-vertical__preview-text">
                            <?php
                            $APPLICATION->IncludeComponent(
                                "sprint.editor:blocks",
                                ".default",
                                Array(
                                    "JSON" => $att_preview_text,
                                ),
                                $component,
                                Array(
                                    "HIDE_ICONS" => "Y"
                                )
                            );
                            ?>
                        </div>
                        <?php endif; ?>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="btn btn-primary article-vertical__btn" rel="nofollow">
                            <?= GetMessage("btn_text"); ?> <i class="fa-solid fa-angle-right article-vertical__btn-icon"></i>
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
