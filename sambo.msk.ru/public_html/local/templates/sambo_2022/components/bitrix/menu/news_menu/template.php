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
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */
use Bitrix\Main\Localization\Loc;
?>

<?php if (!empty($arResult)): ?>
<aside class="menu-subsections-aside">
    <div class="menu-subsections-aside__title"><?= Loc::getMessage('NEWS_MENU_SUBSECTIONS_TITLE'); ?>:</div>
    <ul class="nav nav-pills">
    <?php
    foreach($arResult as $arItem):
        if ($arParams['MAX_LEVEL'] === 1 && $arItem['DEPTH_LEVEL'] > 1) {
            continue;
        }
        ?>
        <li class="nav-item">
            <a<?php if(!$arItem['SELECTED']): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
                    class="nav-link<?php if($arItem['SELECTED']): ?> active<?php endif; ?>"
                    <?php if($arItem['SELECTED']): ?>
                    aria-current="page"
                    <?php endif; ?>><?= $arItem['TEXT']; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</aside>
<?php endif; ?>