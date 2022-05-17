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

function get_views_with_declension (int $views_counter = 0):string
{
    $viewsDeclension = new Declension('просмотр', 'просмотра', 'просмотров');
    return $views_counter . ' ' . $viewsDeclension->get($views_counter);
}

function use_wide_template (string $url):bool
{
    $patterns = [
        '#^/nashi-zaly/([0-9a-zA-Z_-]+)/$#',
        '#^/kontakty/$#',
        '#^/o-nas/trenery/([0-9a-zA-Z_-]+)/$#',
        '#^/vidy-sporta/sambo-v-moskve/$#',
        '#^/vidy-sporta/dzyudo-v-moskve/$#',
        '#^/o-nas/$#',
    ];
    for ($i = 0; $i < count($patterns); $i++) {
        preg_match($patterns[$i], $url, $matches);
        if (count($matches) > 0) {
            return true;
        }
    }
    return false;
}