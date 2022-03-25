<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Страхование он-лайн для спорта");
$APPLICATION->SetPageProperty("keywords", "Страхование он-лайн для спорта");
$APPLICATION->SetPageProperty("title", "Страхование он-лайн для спорта");
$APPLICATION->SetTitle("Страхование он-лайн для спорта");
?><iframe src="https://api.sport.insure/calculator-frame?v=2&promo=SAMBO.MSK&sport=144" scrolling="no" width="100%" height="2100" frameborder="0" onload="window.addEventListener('message',(function(event){if(event.origin!='https://api.sport.insure')return;switch(event.data.type){case'calc-height':this.style.height=event.data.value+'px'}}).bind(this));var f;this.getBoundingClientRect&&(f=(function(){this.contentWindow.postMessage({top:this.getBoundingClientRect().top},'https://api.sport.insure')}).bind(this),window.addEventListener('scroll',f),window.addEventListener('resize',f))"></iframe><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>