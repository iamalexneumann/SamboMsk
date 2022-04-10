<?php
require_once ('functions.php');

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
$siteparam_whatsapp_text = \COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_TEXT') ?? '';
$siteparam_whatsapp_text_converted = convert_space_to_url_code($siteparam_whatsapp_text);
$siteparam_main_email = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_EMAIL') ?? '';
$siteparam_telegram = \COption::GetOptionString( 'askaron.settings', 'UF_TELEGRAM') ?? '';
$siteparam_vk = \COption::GetOptionString( 'askaron.settings', 'UF_VK') ?? '';

$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
