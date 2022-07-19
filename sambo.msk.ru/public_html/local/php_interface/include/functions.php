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

function get_img_name_from_cur_dir (string $CurDir):string
{
    if ($CurDir === '/') {
        return 'og-index.jpg';
    }
    $img_name_array = explode('/', $CurDir);
    return 'og-' . $img_name_array[count($img_name_array) - 2] . '.jpg';
}

function create_og_img (string $img_path, string $text, string $img_output_name)
{
    $img_folder_path = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/img';
    if (file_exists($img_folder_path . '/og-media/' . $img_output_name) !== true) {
        $img = imagecreatefromjpeg($img_path);
        $img_size = getimagesize($img_path);
        $img_substrate = imagecreatefrompng($img_folder_path . '/og-media-substrate.png');

        $img_width = (int)$img_size[0] - 60;
        $img_height = (int)$img_size[1];
        imagecopy($img, $img_substrate, 0, 0, 0, 0, $img_width + 60, $img_height);

        putenv('GDFONTPATH=' . $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/fonts/OpenSans/');
        $font = 'OpenSans-ExtraBold.ttf';
        $font_size = 32;
        $text = mb_strtoupper($text);
        $font_color = imagecolorallocate($img, 255, 255, 255);

        $text_arr = explode(' ', $text);
        $text_new = '';

        foreach ($text_arr as $word) {
            $tmp_string = $text_new . ' ' . $word;
            $tmp_box = imagettfbbox($font_size, 0, $font, $tmp_string);
            if ($tmp_box[2] > $img_width) {
                $text_new .= ($text_new === '' ? '' : "\n") . $word;
            } else {
                $text_new .= ($text_new === '' ? '' : ' ') . $word;
            }
        }

        $text_arr = explode("\n", $text_new);
        $height_tmp = 0;
        $cord_center_y = ($img_height - (count($text_arr) * ($font_size * 1.8))) / 2;

        foreach ($text_arr as $text_str) {
            $text_box = imagettfbbox($font_size, 0, $font, $text_str);
            $left_x = round(($img_width - ($text_box[2] - $text_box[0])) / 2);
            imagettftext($img, $font_size ,0 , 30 + $left_x, 32 + $cord_center_y + $height_tmp, $font_color, $font, $text_str);
            $height_tmp = $height_tmp + $font_size * 1.8;
        }

        imagejpeg($img, $img_folder_path . '/og-media/' . $img_output_name, 100);
        imagedestroy($img);
        imagedestroy($img_substrate);
    }
}