<?php

$settings = [
    'title' => 'Макет достижений тренера',
    'layout_enabled' => [
        'layout_none',
    ],
    'wide_mode' => true,
    'block_settings' => [
        'lists' => [
            'type' => [
                'type' => 'select',
                'default' => 'ul',
                'value'   => [
                    'ul' => 'Маркированный',
                ],
            ],
        ],
    ],
    'block_enabled' => [
        'lists',
    ],
];