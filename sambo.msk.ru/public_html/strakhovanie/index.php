<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Страхование спортсменов от несчастного случая при занятиях самбо и дзюдо");
$APPLICATION->SetTitle("Онлайн страхование для самбо и дзюдо");
?><iframe src="https://api.sport.insure/calculator-frame?v=2&promo=SAMBO.MSK&sport=144" scrolling="no" width="100%" height="2100" frameborder="0" onload="window.addEventListener('message',(function(event){if(event.origin!='https://api.sport.insure')return;switch(event.data.type){case'calc-height':this.style.height=event.data.value+'px'}}).bind(this));var f;this.getBoundingClientRect&&(f=(function(){this.contentWindow.postMessage({top:this.getBoundingClientRect().top},'https://api.sport.insure')}).bind(this),window.addEventListener('scroll',f),window.addEventListener('resize',f))"></iframe>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>