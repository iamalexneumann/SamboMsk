<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?><div class="main-about-us">
    <?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "about_block",
				"EDIT_TEMPLATE" => ""
			)
		);?>
    <?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "about_features",
				"EDIT_TEMPLATE" => ""
			)
		);?>
    <?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "about_form",
				"EDIT_TEMPLATE" => ""
			)
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "trainers",
				"EDIT_TEMPLATE" => ""
			)
		);?>
    <?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "athletes",
				"EDIT_TEMPLATE" => ""
			)
		);?>
    <?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "halls",
				"EDIT_TEMPLATE" => ""
			)
		);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>