<?php
$siteparam_section_head = \COption::GetOptionString( 'askaron.settings', 'UF_SECTION_HEAD') ?? '';
$siteparam_section_body_before = \COption::GetOptionString( 'askaron.settings', 'UF_SECTION_BODY_BEFORE') ?? '';
$siteparam_section_body_after = \COption::GetOptionString( 'askaron.settings', 'UF_SECTION_BODY_AFTER') ?? '';
$siteparam_main_logo = CFile::GetPath(\COption::GetOptionString( 'askaron.settings', 'UF_MAIN_LOGO') ?? '');
$siteparam_footer_logo = CFile::GetPath(\COption::GetOptionString( 'askaron.settings', 'UF_FOOTER_LOGO') ?? '');
$siteparam_main_logo_name = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_LOGO_NAME') ?? '';
$siteparam_main_logo_description = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_LOGO_DESCRIPTION') ?? '';
$siteparam_site_name = $siteparam_main_logo_description . ' &#34;' . $siteparam_main_logo_name . '&#34;';
$siteparam_main_phone = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_PHONE') ?? '';
$siteparam_second_phone = \COption::GetOptionString( 'askaron.settings', 'UF_SECOND_PHONE') ?? '';
$siteparam_main_phone_tel = substr(clear_symbols_in_phone_number($siteparam_main_phone), 1);
$siteparam_second_phone_tel = substr(clear_symbols_in_phone_number($siteparam_second_phone), 1);
$siteparam_whatsapp_number = \COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_NUMBER') ?? '';
$siteparam_whatsapp_number_tel = substr(clear_symbols_in_phone_number($siteparam_whatsapp_number), 1);
$siteparam_whatsapp_number__ivan = \COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_NUMBER_IVAN') ?? '';
$siteparam_whatsapp_number_tel__ivan = substr(clear_symbols_in_phone_number($siteparam_whatsapp_number__ivan), 1);
$siteparam_whatsapp_text = \COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_TEXT') ?? '';
$siteparam_whatsapp_text_converted = convert_space_to_url_code($siteparam_whatsapp_text);
$siteparam_main_email = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_EMAIL') ?? '';
$siteparam_telegram = \COption::GetOptionString( 'askaron.settings', 'UF_TELEGRAM') ?? '';
$siteparam_telegram_chat = \COption::GetOptionString( 'askaron.settings', 'UF_TELEGRAM_CHAT') ?? '';
$siteparam_vk = \COption::GetOptionString( 'askaron.settings', 'UF_VK') ?? '';
$siteparam_requisites = \COption::GetOptionString( 'askaron.settings', 'UF_REQUISITES') ?? '';

$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
