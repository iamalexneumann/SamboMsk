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

if (!is_array($arResult['arMap']) || count($arResult['arMap']) < 1) {
    return;
}

$arRootNode = Array();
foreach ($arResult['arMap'] as $index => $arItem) {
	if ($arItem['LEVEL'] === 0) {
        $arRootNode[] = $index;
    }
}
?>
<ol class="custom-ol-list ps-0">
<?php
$previousLevel = -1;
$counter = 0;

foreach ($arResult['arMap'] as $index => $arItem):
    $arItem['FULL_PATH'] = htmlspecialcharsbx($arItem['FULL_PATH'], ENT_COMPAT, false);
    $arItem['NAME'] = htmlspecialcharsbx($arItem['NAME'], ENT_COMPAT, false);
    $arItem['DESCRIPTION'] = htmlspecialcharsbx($arItem['DESCRIPTION'], ENT_COMPAT, false);

    if ($arItem['LEVEL'] < $previousLevel) {
        echo str_repeat('</ol></li>', ($previousLevel - $arItem['LEVEL']));
    } ?>
    <?php if (array_key_exists($index + 1, $arResult['arMap']) && $arItem['LEVEL'] < $arResult['arMap'][$index + 1]['LEVEL']): ?>
    <li>
        <a href="<?= $arItem['FULL_PATH']; ?>"><?= $arItem['NAME']; ?></a>
        <?php if ($arParams['SHOW_DESCRIPTION'] === 'Y' && $arItem['DESCRIPTION'] <> ''): ?>
        <div class="pb-2 pt-2 ps-4 small"><?= stristr($arItem['DESCRIPTION'], '.', true); ?>.</div>
        <?php endif; ?>
        <ol class="custom-ol-list">
    <?php else: ?>
    <li>
        <a href="<?= $arItem['FULL_PATH']; ?>"><?= $arItem['NAME']; ?></a>
        <?php if ($arParams['SHOW_DESCRIPTION'] === 'Y' && $arItem['DESCRIPTION'] <> ''): ?>
        <div class="pb-2 pt-2 small"><?= stristr($arItem['DESCRIPTION'], '.', true); ?>.</div>
        <?php endif; ?>
    </li>
    <?php endif; ?>
    <?php
    $previousLevel = $arItem['LEVEL'];
    if ($arItem['LEVEL'] == 0) {
        $counter++;
    } ?>
<?php endforeach; ?>
<?php if ($previousLevel > 1) {
    echo str_repeat('</ol></li>', ($previousLevel-1));
} ?>
</ol>