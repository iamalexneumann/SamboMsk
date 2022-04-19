<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetTitle("Главная");
?>
<section class="main-section">
    <div class="container">
        <h2 class="main-section__title">Школа спортивных единоборств "МСК ТРИ МЕДВЕДЯ"</h2>
        <div class="float-block float-block_left">
            <img alt="Школа спортивных единоборств &#34;МСК Три медведя&#34; - лого" src="/upload/about_logo.jpg">
        </div>
        <p>Школа спортивных единоборств «МСК ТРИ МЕДВЕДЯ» создана для того, чтобы как можно больше мальчиков и девочек познакомились со спортивными единоборствами, приобщились к спорту, стали физически крепкими людьми, полюбили самбо и дзюдо, прониклись философией спорта и единоборств.</p>
        <p>У каждого вида борьбы есть своя философия. В самбо эта философия заложена в самом названии — «самозащита без оружия». Умение защитить себя и своих близких придает нам веру в свои силы, повышает самооценку. По счастью, в Москве работает множество детских спортивных школ и клубов. Пробуйте себя в разных направлениях, развивайте свои способности. Найдите свой спорт и свою секцию!</p>
        <p>Школа спортивных единоборств «МСК ТРИ МЕДВЕДЯ» приглашает на тренировки по самбо детей с 5-ти лет.</p>
        <div class="float-block float-block_right">
            <img alt="Школа спортивных единоборств &#34;МСК Три медведя&#34; - бросок" src="/upload/medialibrary/c8d/c8dd9ce0cf10f4b41c990aca65fb1971.png">
        </div>
        <p>Регулярные занятия самбо по научно-обоснованной программе тренировок обеспечивают всестороннюю физическую подготовленность, гармоничное развитие у ребенка всех необходимых физических навыков. В процессе тренировки используются комплексы общеразвивающих упражнений ( т.е технически несложные для выполнения упражнения) для укрепления групп мышц, развития выносливости и координации, силы и ловкости, гибкости (бег, гимнастика, подтягивания, приседания, отжимания, прыжки, акробатика).</p>
        <p>Ребята осваивают приемы страховки и самостраховки (группировка является основным элементом самостраховки).</p>
        <p>Никто из нас не застрахован от падения. Умение правильно падать пригодится не только в спортивных единоборствах!</p>
        <p>Наша школа приглашает всех желающих заниматься самбо!</p>
        <p class="fw-bold">Приходите на пробную бесплатную тренировку!</p>
    </div>
</section>
<section class="main-section">
    <div class="container">
        <h2 class="main-section__title">Наши тренеры</h2>
        <div class="main-section__subtitle">Педагогический состав с многолетним опытом работы. Все тренеры действующие мастера спорта или кандидаты в мастера спорта по самбо и дзюдо.</div>
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "coaches_list",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "6",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "10",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "main_pagination",
                "PAGER_TITLE" => "Тренеры",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("ATT_RANK", "ATT_BIRTHDAY", "ATT_ACHIEVMENTS", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "TAG_LIST" => "",
                "TAG_TITLE" => "3"
            )
        ); ?>
    </div>
</section>
    <section class="main-section">
        <div class="container">
            <h2 class="main-section__title">Наши залы</h2>
            <div class="main-section__subtitle">Мы постоянно работаем над расширением нашей географии. Наши залы расположены в Москве и области - выберите удобный для Вас.</div>
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "halls_list",
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("", ""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "20",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main_pagination",
                    "PAGER_TITLE" => "Тренеры",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("ATT_PHONES", "ATT_FEATURES", "ATT_SET_OPEN", "ATT_ADDRESS"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N",
                    "TAG_LIST" => "",
                    "TAG_TITLE" => "3"
                )
            ); ?>
        </div>
    </section>
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/halls_map.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>