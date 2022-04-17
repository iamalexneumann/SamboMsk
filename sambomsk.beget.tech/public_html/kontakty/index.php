<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="main-content container">
	<div class="contacts-links">
		<div class="links-halls">
 <b>Наши залы</b>
			<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom_extra_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "bottom",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "bottom_extra_menu",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
		</div>
		<div class="header-contacts">
 <b>Наши реквизиты</b>
			<div>
				<p>
 <b>ОГРН:</b> 1167700068161<br>
 <b>ИНН:</b> 7728350420<br>
 <b>КПП:</b> 772801001<br>
 <b>ОПФ:</b> Автономные некоммерческие организации<br>
 <b>Регистратор:</b> УПРАВЛЕНИЕ ФЕДЕРАЛЬНОЙ НАЛОГОВОЙ СЛУЖБЫ ПО Г.МОСКВЕ
				</p>
			</div>
		</div>
		<div class="contacts-social">
 <b>Наши контакты</b>
			<div class="phones contacts-round">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "phone",
		"EDIT_TEMPLATE" => ""
	)
);?>
			</div>
 <a href="#" class="btn btn-red btn-call-me">Перезвоните мне</a>
			<div class="email contacts-round">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "mail",
		"EDIT_TEMPLATE" => ""
	)
);?>
			</div>
			<div class="student-social">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "social_links",
		"EDIT_TEMPLATE" => ""
	)
);?>
			</div>
		</div>
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "form",
		"EDIT_TEMPLATE" => ""
	)
);?>
</div>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/halls_map.php');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>