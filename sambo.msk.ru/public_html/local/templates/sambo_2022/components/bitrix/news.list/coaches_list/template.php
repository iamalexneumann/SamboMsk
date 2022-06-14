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
<div class="coaches-list">
    <div class="row">
        <?php
        foreach($arResult["ITEMS"] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-lg-6 coaches-list__col">
                <article class="coach" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="coach__img-link" rel="nofollow">
                        <img src="<?= $arItem["PICTURE_LQIP"]["SRC"]; ?>"
                             data-src="<?= $arItem["PICTURE"]["SRC"]; ?>"
                             class="coach__img lazyload blur-up"
                             alt="<?= $arItem["NAME"]; ?>"
                             width="<?= $arItem["PICTURE"]["WIDTH"]; ?>"
                             height="<?= $arItem["PICTURE"]["HEIGHT"]; ?>">
                    </a>
                    <div class="coach__wrapper">
                        <header class="coach__header">
                            <h<?= $param_tag_title; ?> class="coach__title">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>" class="coach__link"><?= $arItem["NAME"]; ?></a>
                            </h<?= $param_tag_title; ?>>
                            <?php if ($arItem["AGE"]): ?>
                            <div class="coach__age"><?= $arItem["AGE"]; ?></div>
                            <?php endif; ?>
                        </header>
                        <?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"] || $arItem["DISPLAY_PROPERTIES"]["ATT_RANK"]["VALUE"]): ?>
                        <div class="coach__achievments">
                            <?php if ($arItem["DISPLAY_PROPERTIES"]["ATT_RANK"]["VALUE"]): ?>
                            <div class="coach__rank">
                                <div class="coach__rank-icon">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                                <div class="coach__rank-text">
                                    <?= $arItem["DISPLAY_PROPERTIES"]["ATT_RANK"]["VALUE"]; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                            if ($arItem["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"]) {
                                $APPLICATION->IncludeComponent(
                                    "sprint.editor:blocks",
                                    ".default",
                                    Array(
                                        "JSON" => $arItem["DISPLAY_PROPERTIES"]["ATT_ACHIEVMENTS"]["~VALUE"],
                                    ),
                                    $component,
                                    Array(
                                        "HIDE_ICONS" => "Y"
                                    )
                                );
                            } ?>
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
if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
    echo $arResult["NAV_STRING"];
}
?>
