<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Карта сайта МСК \"Три медведя\"");
$APPLICATION->SetTitle("Карта сайта");
?>
<?php $APPLICATION->IncludeComponent(
    "bitrix:main.map",
    "main_map",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "COL_NUM" => "1",
        "COMPONENT_TEMPLATE" => ".default",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "LEVEL" => "10",
        "SET_TITLE" => "Y",
        "SHOW_DESCRIPTION" => "Y"
    )
); ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>