<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("\"Три медведя\" - школа дзюдо и самбо в Москве для детей и взрослых");
?>
<div class="main-section">
    <div class="container">
        <p>Спорт - это особый мир, попадая в который каждый человек независимо от возраста и рода деятельности, начинает иначе воспринимать то, что его окружает. Такие виды спортивных единоборств, как самбо и дзюдо не только позволяют достичь нормальных физических показателей, но и учат выдержке, нацеленности на результат, терпению, самодисциплине, а также тренируют силу воли и во многом помогают понять, что такое дружба и настоящее братсво.Наш клуб создан для того, чтобы как можно больше ребят имели возможность стать физически развитыми и внутренне крепкими людьми, благодаря систематическим и насыщенным тренировкам.</p>
        <p>Наш спортивный клуб дзюдо и самбо в Москве создан прежде всего для того, чтобы как можно больше ребят имели возможность с раннего возраста развивать физическую силу и выстраивать неискаженную систему ценностей, становясь внутренне сильными и справедливыми людьми - достойными членами социума.</p>
        <p>К счастью в столице нашей страны, каждый ребенок, а также взрослый человек, могут найти спортивные занятия по душе, а также оптимально подходящие индивидуальному уровню подготовки. Мы со своей стороны предлагаем вам такие популярные во всем мире виды единоборств, как самбо и дзюдо.</p>
        <p>Клуб "Три медведя" отвечает всем требованиям проведения занятий по самбо на самом высоком уровне. Тренеры имеют богатый спортивный опыт и обладают отличными педагогическими навыками, поэтому могут найти подход к любому ученику при условии, что он действительно хочет заниматься самбо, вкладывая в любимое дело силы и время.</p>
        <p>Школа спортивных единоборств «МСК ТРИ МЕДВЕДЯ» - это возможность продемонстрировать ребенку, что такое спорт с раннего возраста: самым маленьким нашим ученикам всего 5 лет. Мы работаем и с детьми старшего возраста, предварительно оценив их подготовку и степень физического, а также эмоционального развития.</p>
        <p>Согласно научно-обоснованной программе тренировок, регулярные занятия самбо обеспечивают всестороннюю физическую подготовку, гармоничное развитие у ребенка всех необходимых физических навыков. В процессе занятий мы применяем комплексы общеразвивающих упражнений (технически несложные для выполнения приемы) для укрепления определенных групп мышц, развития выносливости и координации, силы и ловкости, а также гибкости (для этого ученики занимаются бегом, гимнастикой, акробатикой, выполняют подтягивания, приседания, отжимания и т. п.). Ребята также осваивают приемы страховки и самостраховки с ее ключевым элементом - группировкой. Это крайне важная часть занятий, ведь никто из нас не застрахован от падений, а умение вовремя сгруппироваться пригодится не только в спортивных единоборствах!</p>
        <p>Наш клуб приглашает на тренировки самбо и дзюдо всех ребят, которые имеют желание научиться одному из самых эффективных боевых искусств в мире!</p>
    </div>
</div>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_TEMPLATE_PATH . "/include/section_features_ru.php",
    )
);?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_TEMPLATE_PATH . "/include/section_coaches_ru.php",
    )
);?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_TEMPLATE_PATH . "/include/section_photos_ru.php",
    )
);?>
<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_main_form_ru.php'); ?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_TEMPLATE_PATH . "/include/section_halls_ru.php",
    )
);?>
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_halls_yandex_ru.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>