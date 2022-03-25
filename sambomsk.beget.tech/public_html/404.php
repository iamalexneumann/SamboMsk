<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404 - страница не найдена"); ?><p class="error-title">
	Запрашиваемая Вами страница недоступна или была удалена
</p>
<div class="more-pages clearfix">
	<div class="title">
		Но у нас есть много других интересных страниц:
	</div>
	<div class="more-pages-img">
 <img width="258" src="/bitrix/templates/sambo/img/more-pages.png" height="194" alt="Самбисты">
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.map",
	"404",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COL_NUM" => "1",
		"COMPONENT_TEMPLATE" => ".default",
		"LEVEL" => "3",
		"SET_TITLE" => "N",
		"SHOW_DESCRIPTION" => "N"
	)
);?>
</div>
<div class="error-img">
 <img width="534" alt="404" src="/bitrix/templates/sambo/img/404.jpg" height="358">
</div><? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>