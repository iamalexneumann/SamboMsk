<form action="/mails/kontakti.php" class="contacts-form" method="POST">
	<div class="title">
		 Остались вопросы?
	</div>
	<p>
		 Свяжитесь с нами!
	</p>
	<fieldset>
 <input type="text" name="name" placeholder="Ваше имя"> <input type="email" name="email" placeholder="Ваше e-mail" required="">
	</fieldset>
 <textarea name="message" placeholder="Сообщение" required=""></textarea> <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>"> <label class="checkbox"> <input type="checkbox" required="" checked=""> Нажимая кнопку "Отправить", я соглашаюсь с <a href="/politika-konfidentsialnosti/">Политикой конфиденциальности</a>. </label> <button class="btn btn-red" type="submit">Отправить</button>
</form>