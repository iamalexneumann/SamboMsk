<?php
function clear_symbols_in_phone_number (string $phone):string
{
    return preg_replace('![^0-9]+!', '', $phone);
}

function convert_space_to_url_code (string $input_string):string
{
    return preg_replace('/\s+/', '%20', $input_string);
}