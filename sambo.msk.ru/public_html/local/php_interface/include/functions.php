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
    $regex_pattern = '/(?:https?:)?(?:\/\/)?(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*?[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|<\/a>))[?=&+%\w.-]*/';
    preg_match($regex_pattern, $url, $mathes);
    return $mathes[1];
}

function get_vk_video_id($url): ?string {
    $parsedUrl = parse_url($url);

    if (!isset($parsedUrl['path'])) {
        return null;
    }

    $pathParts = explode('-', $parsedUrl['path']);
    if (count($pathParts) < 2) {
        return null;
    }

    $groupPart = $pathParts[1];
    $idPart = explode('_', $groupPart);

    if (count($idPart) != 2) {
        return null;
    }

    $groupId = '-' . $idPart[0];
    $itemId = $idPart[1];

    return $groupId . '&id=' . $itemId;
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

function use_comagic (string $url):bool
{
    $patterns = [
//        '#^/nashi-zaly/sambo-i-dzyudo-v-grad-moskovskom/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-mitino/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-shcherbinke/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-moskovskom/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-fili-davydkovo/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-moskovskom-3-y-mikrorayon/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-na-vereyskoy/$#',
//        '#^/nashi-zaly/sambo-i-dzyudo-v-poselke-znamya-oktyabrya/$#',
    ];
    for ($i = 0; $i < count($patterns); $i++) {
        preg_match($patterns[$i], $url, $matches);
        if (count($matches) > 0) {
            return true;
        }
    }
    return false;
}

function use_ivans_phone_number (string $url):bool
{
    $patterns = [
        '#^/nashi-zaly/sambo-i-dzyudo-v-kuzminkakh/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-vniissok/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-novogireevo/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-novogireevo-mkr-yuzhnoe-izmaylovo/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-troitske-mikrorayon-v/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-troitske/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-odintsovo/$#',
        '#^/nashi-zaly/sambo-i-dzyudo-v-kommunarke/$#',
        '#^/nashi-zaly/sambo-dzyudo-boevoe-sambo-i-boks-v-balashikhe/$#'
    ];
    for ($i = 0; $i < count($patterns); $i++) {
        preg_match($patterns[$i], $url, $matches);
        if (count($matches) > 0) {
            return true;
        }
    }
    return false;
}

function get_telegram_discussion (string $url):string
{
    return str_replace('https://t.me/', '', $url);
}

function get_section_code_from_page_url (string $cur_page):string
{
    $url_explode = explode('/', $cur_page);
    return array_slice($url_explode, -2, 1)[0];
}

function get_uf_from_section (int $iblock_id, string $section_code):array
{
    $sections = CIBlockSection::GetList(
        [],
        [
            'IBLOCK_ID' => $iblock_id,
            '=CODE' => $section_code
        ],
        false,
        ["UF_*"],
    );
    if ($section = $sections->Fetch()) {
        return $section;
    }
    return [];
}

/**
 * Функция возвращает массив с ID элемента через фильтрацию по его ELEMENT_CODE.
 * @param string $element_code ELEMENT_CODE элемента инфоблока
 * @return array Массив с ID элемента
 */
function get_element_id_from_element_code (string $element_code):array
{
    $elements_list = CIBlockElement::GetList(
        [],
        [
            '=CODE' => $element_code,
            'ACTIVE' => 'Y',
        ],
        false,
        false,
        [
            'ID',
            'NAME'
        ],
    );
    $elements = [];
    while ($arr_elements = $elements_list->Fetch()) {
        $elements = $arr_elements;
    }
    return $elements;
}

/**
 * Функция проверяет наличие элементов в инфоблоке по заданному фильтру
 * @param array $filter Фильтр с параметрами
 * @return array Массив элементов
 */
function is_empty_iblock (array $filter):array
{
    $elements_list = CIBlockElement::GetList(
        [],
        $filter,
        false,
        false,
        ['ID'],
    );
    $elements = [];
    while ($arr_elements = $elements_list->Fetch()) {
        $elements = $arr_elements;
    }
    return $elements;
}

/**
 * Функция, переводящая первый символ строки в нижний регистр. Стандартная функция lcfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым строчным символом.
 */
function custom_lcfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtolower(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}

/**
 * Функция, переводящая первый символ строки в верхний регистр. Стандартная функция ucfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым заглавным символом.
 */
function custom_ucfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}

function get_img_name_from_cur_dir (string $CurDir):string
{
    if ($CurDir === '/') {
        return 'og-index.jpg';
    }
    $img_name_array = explode('/', $CurDir);
    return 'og-' . $img_name_array[count($img_name_array) - 2] . '.jpg';
}

//function create_og_img (string $img_path, string $text, string $img_output_name)
//{
//    $img_folder_path = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/img';
//    if (file_exists($img_folder_path . '/og-media/' . $img_output_name) !== true) {
//        $img = imagecreatefromjpeg($img_path);
//        $img_size = getimagesize($img_path);
//        $img_substrate = imagecreatefrompng($img_folder_path . '/og-media-substrate.png');
//
//        $img_width = (int)$img_size[0] - 60;
//        $img_height = (int)$img_size[1];
//        imagecopy($img, $img_substrate, 0, 0, 0, 0, $img_width + 60, $img_height);
//
//        putenv('GDFONTPATH=' . $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/fonts/OpenSans/');
//        $font = 'OpenSans-ExtraBold.ttf';
//        $font_size = 32;
//        $text = mb_strtoupper($text);
//        $font_color = imagecolorallocate($img, 255, 255, 255);
//
//        $text_arr = explode(' ', $text);
//        $text_new = '';
//
//        foreach ($text_arr as $word) {
//            $tmp_string = $text_new . ' ' . $word;
//            $tmp_box = imagettfbbox($font_size, 0, $font, $tmp_string);
//            if ($tmp_box[2] > $img_width) {
//                $text_new .= ($text_new === '' ? '' : "\n") . $word;
//            } else {
//                $text_new .= ($text_new === '' ? '' : ' ') . $word;
//            }
//        }
//
//        $text_arr = explode("\n", $text_new);
//        $height_tmp = 0;
//        $cord_center_y = ($img_height - (count($text_arr) * ($font_size * 1.8))) / 2;
//
//        foreach ($text_arr as $text_str) {
//            $text_box = imagettfbbox($font_size, 0, $font, $text_str);
//            $left_x = round(($img_width - ($text_box[2] - $text_box[0])) / 2);
//            imagettftext($img, $font_size ,0 , 30 + $left_x, 32 + $cord_center_y + $height_tmp, $font_color, $font, $text_str);
//            $height_tmp = $height_tmp + $font_size * 1.8;
//        }
//
//        imagejpeg($img, $img_folder_path . '/og-media/' . $img_output_name, 100);
//        imagedestroy($img);
//        imagedestroy($img_substrate);
//    }
//}