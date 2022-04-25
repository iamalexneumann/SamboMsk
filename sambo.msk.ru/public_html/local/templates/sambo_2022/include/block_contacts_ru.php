<div class="contacts-block__communications">
    <div class="footer-phones">
        <i class="fa-solid fa-phone footer-phones__icon"></i>
        <div class="footer-phones__wrapper">
            <a href="tel:+7<?= $siteparam_main_phone_tel; ?>" class="footer-phones__main-phone">
                +7 <?= substr($siteparam_main_phone, 1); ?>
            </a>
            <?php if ($siteparam_second_phone_tel): ?>
                <a href="tel:+7<?= $siteparam_second_phone_tel; ?>" class="footer-phones__second-phone">
                    +7 <?= substr($siteparam_second_phone, 1); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <button type="button" class="btn btn-danger footer-btn-callback">Заказать звонок</button>
    <a href="mailto:<?= $siteparam_main_email; ?>" title="Написать E-mail" class="footer-email">
        <i class="fa-solid fa-envelope footer-email__icon"></i>
        <span class="footer-email__link"><?= $siteparam_main_email; ?></span>
    </a>
    <?php if ($siteparam_telegram || $siteparam_vk || $siteparam_whatsapp_number): ?>
    <ul class="social-media footer-social-media">
        <?php if ($siteparam_telegram): ?>
        <li class="social-media__item">
            <a href="https://t.me/<?= $siteparam_telegram; ?>" target="_blank"
               title="Наш канал в Telegram" class="social-media__link social-media__telegram">
                <i class="fa-brands fa-telegram"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($siteparam_vk): ?>
        <li class="social-media__item">
            <a href="<?= $siteparam_vk; ?>" target="_blank"
               title="Наше сообщество в VK" class="social-media__link social-media__vk">
                <i class="fa-brands fa-vk"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($siteparam_whatsapp_number): ?>
        <li class="social-media__item">
            <a href="https://wa.me/7<?= $siteparam_whatsapp_number_tel; ?><?php if ($siteparam_whatsapp_text): ?>?text=<?= $siteparam_whatsapp_text_converted; ?><?php endif; ?>"
               target="_blank" title="Написать в WhatsApp" class="social-media__link social-media__whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</div>