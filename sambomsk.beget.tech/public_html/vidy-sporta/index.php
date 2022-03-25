<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Виды спорта");
?><div class="block-text">
	<h2>Самбо или дзюдо?</h2>
	<p>
		 Давайте попробуем разобраться.
	</p>
	<ul>
		<li>Самбо, как и дзюдо – вид спортивного единоборства.</li>
		<li style="text-align: justify;">Самбо более молодой вид единоборства (дзюдо старше лет на 50). Годом рождения самбо считается 1938 – год утверждения Спорткомитетом СССР борьбы «самбо» в качестве нового вида спорта)</li>
		<li style="text-align: justify;">Можно сказать, что дзюдо (по японской классификации это современное боевое искусство), лежит в основе самбо, хотя в самбо используются приемы, и тактики других видов борьбы<br>
		</li>
		<li style="text-align: justify;"> Дзюдо - олимпийский вид спорта; самбо, хотя и получило международное признание олимпийским видом спорта не является.</li>
	</ul>
	<p>
		 Конечно, отличия есть:
	</p>
	<ul style="text-align: justify;">
		<li>правила (к примеру, в самбо, разрешен болевой приём на ноги, а в дзюдо – запрещён; в самбо запрещены удушающие приемы, а в &nbsp;дзюдо - разрешены; &nbsp;самбист стоит в более низкой стойке, стойка дзюдоиста — с прямой спиной);</li>
		<li>у самбистов татами круглое, у дзюдоистов &nbsp; - &nbsp;квадратное;</li>
		<li>у самбистов &nbsp;одежда – шорты, самбовка, борцовки, а у &nbsp;дзюдоистов – кимоно, &nbsp;отсутствие&nbsp;обуви)</li>
	</ul>
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"kinds_list_category",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "999",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"age",1=>"action",2=>"img_for_category",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
<div class="block-text">
	<h2>У ЖИЗНИ ЕСТЬ ВКУС... ВКУС БОРЬБЫ. Что такое самбо?</h2>
	<ul>
		<li>Самбо — единственное отечественное единоборство, популярное во всем мире.</li>
		<li>Самбо — это интернациональный вид спорта, достойный стать олимпийским.</li>
		<li>Самбо — единственный в мире вид спорта, где русский язык признан официальным языком международного общения.</li>
		<li>Самбо — развивается в более чем 85 странах мира.</li>
		<li>FIAS ежегодно проводит чемпионаты мира и континентов по спортивному и боевому самбо.&nbsp;</li>
	</ul>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>