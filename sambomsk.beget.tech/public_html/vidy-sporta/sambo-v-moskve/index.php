<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Самбо в Москве");
?>

<section class="main-section">
    <div class="container">
        <h2 class="main-section__title">Несколько слов о самбо</h2>
        <figure class="float-block float-block_left">
            <img src="/upload/brosok-sambo.webp" alt="Несколько слов о самбо">
            <figcaption class="float-block__figcaption">Бросок в самбо</figcaption>
        </figure>
        <ul class="custom-ul-list">
            <li>Самбо — не только вид спортивного единоборства,  это система воспитания, способствующая развитию морально-волевых качеств человека, патриотизма и гражданственности.</li>
            <li>Самбо — это наука обороны, а не нападения. Самбо не только учит самозащите, но и дает богатый жизненный опыт, формирующий твердый мужской характер, стойкость и выносливость, которые необходимы в работе и общественной деятельности.</li>
            <li>Самбо способствует выработке самодисциплины, формирует внутреннюю нравственную опору и сильную личную позицию в достижении жизненных целей. Самбо формирует социальную опору общества, людей, способных постоять за себя, за свою семью, за Родину.</li>
            <li>Традиции самбо уходят корнями в культуру народов России, в народные виды борьбы. </li>
            <li>Самбо включает лучшие практики национальных единоборств: кулачного боя, русской, грузинской, татарской, армянской, казахской, узбекской борьбы; финско-французской, вольно-американской, английской борьбы ланкаширского и кемберлендского стилей, швейцарской, японского дзюдо и сумо и других видов единоборств.</li>
        </ul>
    </div>
</section>
<section class="main-section">
    <div class="container">
        <h2 class="main-section__title">История самбо — история России</h2>
        <figure class="float-block float-block_right">
            <img src="https://sambo.msk.ru/bitrix/templates/sambo/img/sambo-2.jpg" alt="История самбо — история России">
            <figcaption class="float-block__figcaption">Самбо в СССР</figcaption>
        </figure>
        <p>1920-е—1930-е годы - зарождение и становление самбо. Самбо сразу стало развиваться не только, как вид спорта , но и как средство обучения кадрового состава органов правопорядка.</p>
        <p>Основой самбо стали техники дзюдо Кодокан и приемы национальных видов борьбы народов СССР: грузинской, азербайджанской, туркменской и других видов борьбы. Например, «подхват» и «зацеп изнутри», взяты из грузинской борьбы, «зацеп снаружи» — из туркменской , «подсад» — из татарской.</p>
        <p>Уже в 1923 году состоялись первые соревнования по самбо. Поначалу борьба называлась «сам», «самоз», «борьба вольная», «борьба вольного стиля», и только в 1940-е годы – официально утвердилось знакомое и привычное нашему слуху название "самбо".</p>
        <p>У истоков создания самбо стояли А.Харлампиев, В.Ощепков, В.Спиридонов.<br>
            16 ноября 1938 года Всесоюзный комитет по физической культуре и спорту издает приказ «О развитии борьбы вольного стиля», в котором признает ее «чрезвычайно полезной для советской молодежи». Эту дату принято считать днем рождения самбо.</p>
        <p>В 1939 прошел первый чемпионат СССР, в 1940 году – второй.</p>
        <p>В 1940 г - изданы первые руководства по "борьбе вольного стиля" Н. Гапковского и Р. Школьникова, а также пособие для школ НКВД под авторством В.П. Волкова (ученика Ощепкова В.С. и Спиридонова В.А.) - "Курс самозащиты без оружия САМБО"</p>
    </div>
</section>
<section class="main-section clearfix">
    <div class="container">
        <h2 class="main-section__title">Кому подходит самбо</h2>
        <figure class="float-block float-block_left">
            <img src="/upload/coach-with-kids.webp" alt="Кому подходит самбо">
            <figcaption class="float-block__figcaption">Тренер даёт советы детям</figcaption>
        </figure>
        <p>В нашу секцию мы принимаем детей с 5 лет. Следует отметить, что в программе тренировок у детей этого возраста основной упор делается на общую физическую подготовку.</p>
        <p>Осуществляется тренировка всех физических качеств, изучаются основы самостраховки (дети учатся правильно падать), акробатики и простейшие технические действия. Полноценные занятия борьбой рекомендуется с 10 лет, так как до этого возраста суставо-связочный аппарат и многие системы организма еще не готовы к таким нагрузкам.</p>
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