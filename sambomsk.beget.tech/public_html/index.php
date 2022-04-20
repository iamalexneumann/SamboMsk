<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Главная");
$APPLICATION->SetTitle("Главная");
?>
<section class="main-section">
    <div class="container">
        <h2 class="main-section__title">Школа спортивных единоборств "МСК ТРИ МЕДВЕДЯ"</h2>
        <figure class="float-block float-block_left">
            <img alt="Школа спортивных единоборств &#34;МСК Три медведя&#34; - лого" src="/upload/main-logo.png">
            <figcaption class="float-block__figcaption">Логотип "МСК Три медведя"</figcaption>
        </figure>
        <p>Школа спортивных единоборств «МСК ТРИ МЕДВЕДЯ» создана для того, чтобы как можно больше мальчиков и девочек познакомились со спортивными единоборствами, приобщились к спорту, стали физически крепкими людьми, полюбили самбо и дзюдо, прониклись философией спорта и единоборств.</p>
        <p>У каждого вида борьбы есть своя философия. В самбо эта философия заложена в самом названии — «самозащита без оружия». Умение защитить себя и своих близких придает нам веру в свои силы, повышает самооценку. По счастью, в Москве работает множество детских спортивных школ и клубов. Пробуйте себя в разных направлениях, развивайте свои способности. Найдите свой спорт и свою секцию!</p>
        <p>Школа спортивных единоборств «МСК ТРИ МЕДВЕДЯ» приглашает на тренировки по самбо детей с 5-ти лет.</p>
        <figure class="float-block float-block_right">
            <img alt="Школа спортивных единоборств &#34;МСК Три медведя&#34; - бросок" src="/upload/brosok-sambo.webp">
            <figcaption class="float-block__figcaption">Бросок в самбо</figcaption>
        </figure>
        <p>Регулярные занятия самбо по научно-обоснованной программе тренировок обеспечивают всестороннюю физическую подготовленность, гармоничное развитие у ребенка всех необходимых физических навыков. В процессе тренировки используются комплексы общеразвивающих упражнений ( т.е технически несложные для выполнения упражнения) для укрепления групп мышц, развития выносливости и координации, силы и ловкости, гибкости (бег, гимнастика, подтягивания, приседания, отжимания, прыжки, акробатика).</p>
        <p>Ребята осваивают приемы страховки и самостраховки (группировка является основным элементом самостраховки).</p>
        <p>Никто из нас не застрахован от падения. Умение правильно падать пригодится не только в спортивных единоборствах!</p>
        <p>Наша школа приглашает всех желающих заниматься самбо!</p>
        <p class="fw-bold">Приходите на пробную бесплатную тренировку!</p>
    </div>
</section>
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
); ?>
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
); ?>
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_halls_yandex_ru.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>