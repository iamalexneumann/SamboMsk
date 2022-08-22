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
 * @var string $epilogFile
 * @var array $templateData
 * @var CBitrixComponent $component
 */
?>

<?php if (count($arResult['ELEMENTS']) > 0): ?>
<script data-skip-moving="true">
    if (sessionStorage.getItem('hideHeaderMessages') === 'true') {
        document.querySelector('#header-promo-list').classList.add('d-none');
    }

    document.querySelector('#header-promo-list .btn-close').addEventListener('click', function() {
        sessionStorage.setItem('hideHeaderMessages', 'true');
    });
</script>
<?php endif; ?>