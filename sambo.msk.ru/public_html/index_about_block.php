<section class="container screen-about-us screen clearfix">
<h2>Школа спортивных единоборств «МСК Три медведя»</h2>
<div class="float-block float-left">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "about_video",
		"EDIT_TEMPLATE" => ""
	)
);?>
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "about_text",
		"EDIT_TEMPLATE" => ""
	)
);?> </section>