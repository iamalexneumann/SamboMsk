<?php

$settings = [
    'title' => 'Макет детального текста статей',
    'layout_enabled' => [
        'layout_none',
    ],
    'wide_mode' => true,
    'block_settings' => [
        'my_iblock_elements_photos' => [
            'enabled_iblocks' => [
                'type'  => 'hidden',
                'value' => [1],
            ],
        ],
        'htag' => [
            'taglist' => [
                'type' => 'hidden',
                'value' => [
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
            ],

        ],
        'iblock_elements' => [
            'enabled_iblocks' => [
                'type'  => 'hidden',
                'value' => [9],
            ],
        ],
    ],
    'block_enabled' => [
        'text',
        'lists',
        'htag',
        'contents',
        'gallery',
        'properties',
        'snippet',
        'iblock_elements',
        'image',
        'my_float_img',
        'my_iblock_elements_photos',
    ],
    'snippets' => [
        [
            'file' => 'section_inner_form.php',
            'title' => 'Форма внутри страниц',
            'description' => 'Чтобы записаться на бесплатное пробное занятие позвоните по номеру телефона +7 (495) 294-03-33  или закажите обратный звонок, и мы Вам перезвоним.',
        ],
    ],
];