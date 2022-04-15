<?php
function clear_symbols_in_phone_number (string $phone):string
{
    return preg_replace('![^0-9]+!', '', $phone);
}

function convert_space_to_url_code (string $input_string):string
{
    return preg_replace('/\s+/', '%20', $input_string);
}

function get_youtube_id (string $url):string
{
    $regex_pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
    preg_match($regex_pattern, $url, $mathes);
    return $mathes[1];
}

use Bitrix\Main\Grid\Declension;
function get_age (int $year, string $one, string $four, string $five):string
{
    $year = date('Y') - $year;
    if ($year <= 0) {
        return '';
    }
    $yearDeclension = new Declension($one, $four, $five);
    return $year . ' ' . $yearDeclension->get($year);
}