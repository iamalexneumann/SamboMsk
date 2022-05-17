<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Страница благодарности");
?>

<div class="main-section page-thanks">
 <div class="container">
 <div class="row align-items-center">
 <div class="col-lg-6 mb-5">
 <img width="390" src="<?= SITE_TEMPLATE_PATH; ?>/img/thanks-page-img.png" height="411" alt="">
 </div>
 <div class="col-lg-6 contacts-block mb-0">
 <div class="h4">Спасибо. Мы перезвоним Вам в течение дня!</div>
 <a href="/" class="btn btn-primary mb-5">
 <i class="fa-solid fa-angle-left share-block__btn-icon"></i>
 На главную
 </a>
 <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/block_contacts_ru.php'); ?>
 </div>
 </div>
 </div>
</div>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>