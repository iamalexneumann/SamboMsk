<?php /**
 * Подключается перед выводом всех блоков
 *
 * @var $this     SprintEditorBlocksComponent
 * @var $blocks   array - массив со всеми блоками, можно модифицировать
 * @var $arParams array - массив с параметрами компонента
 */

if ($this->arParams['USE_JQUERY'] == 'Y') {
    CUtil::InitJSCore(["jquery"]);
}
echo SITE_TEMPLATE_PATH;
if ($this->arParams['USE_FANCYBOX'] == 'Y') {
    $this->registerCss(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.css');
    $this->registerJs(SITE_TEMPLATE_PATH . '/libs/fancyapps/fancybox.umd.js');
}

if ($this->arParams['USE_GRID'] == 'Y') {
    $this->registerCss($this->findResource('_grid.css'));
}

$this->registerCss($this->findResource('_style.css'));
$this->registerJs($this->findResource('_script.js'));
