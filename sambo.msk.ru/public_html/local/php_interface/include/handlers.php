<?php
AddEventHandler("main", "OnEndBufferContent", "removeAtts");
$eventManager = \Bitrix\Main\EventManager::getInstance();
//$eventManager->addEventHandler("main", "OnEndBufferContent", "deleteKernelJs");
//$eventManager->addEventHandler("main", "OnEndBufferContent", "deleteKernelCss");
$eventManager->addEventHandler("main", "OnEndBufferContent", "deleteKernelCss");
$eventManager->addEventHandler("main", "OnEndBufferContent", "removeSpacesAndTabs");

function removeAtts(&$content)
{
    $content = replace_output($content);
}
function replace_output($d)
{
    return str_replace(
        [' type="text/javascript"', ' />'],
        ['', '>'],
        $d
    );
}

//function deleteKernelJs(&$content) {
//    global $USER, $APPLICATION;
//    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;
//    if($APPLICATION->GetProperty("save_kernel") == "Y") return;
//
//    $arPatternsToRemove = Array(
//        '/<script.+?src=".+?kernel_main\/kernel_main\.js\?\d+"><\/script\>/',
//        '/<script.+?src=".+?bitrix\/js\/main\/core\/core[^"]+"><\/script\>/',
/*        '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',*/
/*        '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',*/
/*        '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',*/
//    );
//
//    $content = preg_replace($arPatternsToRemove, "", $content);
//    $content = preg_replace("/\n{2,}/", "\n\n", $content);
//}
//

//function deleteKernelCss(&$content) {
//    global $USER, $APPLICATION;
//    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;
//    if($APPLICATION->GetProperty("save_kernel") == "Y") return;
//
//    $arPatternsToRemove = Array(
//        '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+"[^>]+>/',
//        '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/',
//        '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/styles.css[^"]+"[^>]+>/',
//        '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/template_styles.css[^"]+"[^>]+>/',
//    );
//
//    $content = preg_replace($arPatternsToRemove, "", $content);
//    $content = preg_replace("/\n{2,}/", "\n\n", $content);
//}

function deleteKernelCss (&$content) {
    global $USER;

    if (!$USER->IsAuthorized()) {
        $arPatternsToRemove = Array(
            '/<link.+?href=".+?kernel_main\/kernel_main_v1\.css\?\d+"[^>]+>/',
            '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/',
            '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
            '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
            // '/<script.+?src=".+?bitrix\/js\/main\/core\/core[^"]+"><\/script\>/',
            '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
            '/BX\.(setCSSList|setJSList)\(\[.+?\]\);/',
            '/\s{2,}/'
        );

        $content = preg_replace($arPatternsToRemove, " ", $content);

    }
}

function removeSpacesAndTabs (&$content) {
    global $APPLICATION;
    $page = $APPLICATION->GetCurPage();

    if ($page != '/bitrix/tools/captcha.php' && $page != '/bitrix/admin/captcha.php') {
        $content = preg_replace("/[ \t]+/", " ", $content);
        $content = str_replace(array("\n \n"), "\n", $content);
    }
}