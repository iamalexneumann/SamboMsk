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
?>

<?php if (!empty($arResult)): ?>
<ul class="footer-menu__list<?= $arParams['CLASS_NAME'] ? ' ' . $arParams['CLASS_NAME'] : ''; ?>">
<?php
$previousLevel = 0;

foreach ($arResult as $arItem):
    if ($previousLevel && $arItem['DEPTH_LEVEL'] < $previousLevel) {
        echo str_repeat('</ul></li>', ($previousLevel - $arItem['DEPTH_LEVEL']));
    }

    if (!$arItem['IS_PARENT']):
        if ($arItem['PERMISSION'] > "D"):
            if ($arItem['DEPTH_LEVEL'] === 1): ?>
    <li class="footer-menu__item">
        <a<?php if ($arItem['SELECTED'] !== true): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
           class="footer-menu__link<?php if ($arItem['SELECTED']): ?> footer-menu__link_active<?php endif; ?>"><?= $arItem['TEXT']; ?></a>
    </li>
<?php
            endif;
        endif;
    endif;
    $previousLevel = $arItem['DEPTH_LEVEL'];
endforeach;
?>
</ul>
<?php endif; ?>