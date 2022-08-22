<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$param_tag_title = $arParams['TAG_TITLE'] ?? '2';
?>
<div class="childrens-list">
    <div class="row">
        <?php
        foreach ($arResult['ITEMS'] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
                [
                    'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
                ]
            );
        ?>
        <div class="col-lg-6 childrens-list__col">
            <article class="children" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a class="children__img-link" href="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
                   data-fancybox="childrens-list"
                   data-caption="<?= $arItem['NAME']; ?>">
                    <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                         data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                         class="children__img lazyload blur-up"
                         alt="<?= $arItem['NAME']; ?>"
                         width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                         height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
                </a>
                <div class="children__wrapper">
                    <header class="children__header">
                        <h<?= $param_tag_title; ?> class="children__title">
                            <?= $arItem['NAME']; ?>
                        </h<?= $param_tag_title; ?>>
                    </header>
                    <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_YEAR']['VALUE']): ?>
                    <div class="children__year">
                        <span class="children__year-text"><?= Loc::getMessage('CHILDRENS_LIST_YEAR_TEXT'); ?></span>:
                        <?= $arItem['DISPLAY_PROPERTIES']['ATT_YEAR']['VALUE']; ?> <?= Loc::getMessage('CHILDRENS_LIST_YEAR_DECLENSION'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_VICTORIES']['VALUE'] || $arItem['DISPLAY_PROPERTIES']['ATT_DEFEAT']['VALUE']): ?>
                    <div class="children__victories-defeat">
                        <div class="children__victories">
                            <span class="children__victories-text"><?= Loc::getMessage('CHILDRENS_LIST_VICTORIES_TEXT'); ?></span>:
                            <?= $arItem['DISPLAY_PROPERTIES']['ATT_VICTORIES']['VALUE']; ?>
                        </div>
                        <div class="children__defeat">
                            <span class="children__defeat-text"><?= Loc::getMessage('CHILDRENS_LIST_DEFEAT_TEXT'); ?></span>:
                            <?= $arItem['DISPLAY_PROPERTIES']['ATT_DEFEAT']['VALUE']; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE']): ?>
                    <div class="children__achievments">
                        <div class="children__achievments-title">
                            <?= Loc::getMessage('CHILDRENS_LIST_ACHIEVMENTS_TEXT'); ?>:
                        </div>
                        <?php
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVMENTS']['~VALUE'],
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
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
} ?>