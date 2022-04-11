<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$param_class_name = $arParams["CLASS_NAME"] ?? '';
if (!empty($arResult)):?>
<ul class="footer-menu__list<?php if ($param_class_name): echo " $param_class_name"; endif; ?>">
<?php
$previousLevel = 0;
foreach($arResult as $arItem):
    if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
        echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
    }

    if (!$arItem["IS_PARENT"]):
        if ($arItem["PERMISSION"] > "D"):
            if ($arItem["DEPTH_LEVEL"] == 1): ?>
    <li class="footer-menu__item">
        <a href="<?=$arItem["LINK"]?>" class="footer-menu__link<?php if ($arItem["SELECTED"]): ?> footer-menu__link_active<?php endif; ?>"><?=$arItem["TEXT"]?></a>
    </li>
            <?php endif; ?>
        <?php endif; ?>
<?php
    endif;
    $previousLevel = $arItem["DEPTH_LEVEL"];
endforeach;
?>
</ul>
<?php endif; ?>