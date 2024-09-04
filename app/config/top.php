<?php

return [
    'phone' => env('APP_PHONE', ''),
    'menu' => [
        [
            'current' => '',
            'link' => 'registration',
            'text' => 'Registration',
        ],
        [
            'current' => 'current',
            'link' => '/',
            'text' => 'Home',
        ],
        [
            'current' => '',
            'link' => 'about',
            'text' => 'About',
        ],
        [
            'current' => '',
            'link' => 'service',
            'text' => 'Service',
        ],
        [
            'current' => '',
            'link' => 'contact',
            'text' => 'Contact',
        ]
    ]
];