<?php

$settings = [
    'title' => 'Макет новости',
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
        ]
    ],
    'block_enabled' => [
        'text',
        'lists',
        'gallery',
        'properties',
        'snippet',
        'my_float_img',
        'my_iblock_elements_photos',
    ],
    'snippets' => [
        [
            'file' => 'cta_tournament.php',
            'title' => 'Приглашаем на тренировки в нашу школу самбо и дзюдо',
            'description' => 'Приглашаем на тренировки в нашу школу самбо и дзюдо "Три Медведя". Выберите удобный зал для посещений на странице "Контакты" и свяжитесь с нами по контактным телефонам +7 (495) 294-03-33, +7 (916) 562-53-80.',
        ],
        [
            'file' => 'section_inner_form.php',
            'title' => 'Форма внутри страниц',
            'description' => 'Чтобы записаться на бесплатное пробное занятие позвоните по номеру телефона +7 (495) 294-03-33  или закажите обратный звонок, и мы Вам перезвоним.',
        ],
    ],
];