<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Страхование спортсменов от несчастного случая при занятиях самбо и дзюдо");
$APPLICATION->SetTitle("Онлайн страхование для самбо и дзюдо");
?>
    <p>Боевые виды искусства, например, самбо и дзюдо — довольно травмоопасные виды спорта, но, при правильном подходе к тренировкам и к технике безопасности, риск травм всегда сводится практически к нулю.</p>
    <p>Все же, даже при грамотном подходе и тренировкам с тренером можно травмироваться. Чтобы получить денежную компенсацию в случае возникновения травмы, есть такая услуга, как страховка. Ею пользуются как профессиональные спортсмены, так и любители. Более того, без полиса медицинского страхования спортсмена могут не допустить к соревнованиям - это обязательное требование некоторых школьных и спортивных учреждений.</p>
    <h2>Что покрывает страховой полис самбо и дзюдо</h2>
    <p>Главная задача страховки заключается в том, чтобы гарантировать выплату денежной компенсации, если спортсмен получил травму во время тренировок и соревнований.</p>
    <p>У любого вида спорта есть профессиональные травмы, связанные конкретно с определенной дисциплиной, и самбо и дзюдо — не исключения.</p>
    <p>Страховой полис покрывает:</p>
    <ul class="custom-ul-list">
        <li>травмы, являющиеся следствием НС во время занятий боевыми искусствами;</li>
        <li>возникновение заболеваний как профессионального, так и критического характера;</li>
        <li>инвалидность, которая стала последствием НС;</li>
        <li>летальный исход.</li>
    </ul>
    <p>Объем денежной компенсации определяется под каждый отдельный случай. Чтобы рассчитать материальную компенсацию, можно воспользоваться <a href="#calc">калькулятором</a> страховки.</p>
    <h2>Страховка для боевых искусств онлайн</h2>
    <p>На нашем сайте вы сможете заказать страховку на любой период, начиная от одного дня, заканчивая годом. Чтобы оформить страховку, надо заполнить следующие поля в калькуляторе:</p>
    <ul class="custom-ul-list">
        <li>ФИО и дату рождения страхуемого;</li>
        <li>условия страхования</li>
        <li>данные страхователя.</li>
    </ul>
    <p>Документ можно сохранить на любом устройстве или заказать на отдельном фирменном бланке - выбирайте удобный вам вариант.</p>
    <h2>Сколько стоит страховка для спортсмена</h2>
    <p>Цена страхового полиса индивидуальна для каждого отдельного случая. В формировании стоимости учитываются:</p>
    <ul class="custom-ul-list">
        <li>сумма конечного страхования;</li>
        <li>сроки;</li>
        <li>возраст;</li>
        <li>виды спорта — допустимо застраховать сразу по 4-м дисциплинам.</li>
    </ul>
    <p>Заполните эти данные и <a href="#calc">калькулятор</a> предложит Вам точную цену. Комиссия за оформление не взимается.</p>
    <div id="calc">
        <iframe src="https://api.sport.insure/calculator-frame?v=2&promo=SAMBO.MSK&sport=144" scrolling="no" width="100%" height="2100" frameborder="0" onload="window.addEventListener('message',(function(event){if(event.origin!='https://api.sport.insure')return;switch(event.data.type){case'calc-height':this.style.height=event.data.value+'px'}}).bind(this));var f;this.getBoundingClientRect&&(f=(function(){this.contentWindow.postMessage({top:this.getBoundingClientRect().top},'https://api.sport.insure')}).bind(this),window.addEventListener('scroll',f),window.addEventListener('resize',f))"></iframe>
    </div>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>