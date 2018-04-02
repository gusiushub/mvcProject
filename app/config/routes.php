<?php
/**
 * Created by PhpStorm.
 * User: zolow
 * Date: 02.04.2018
 * Time: 3:20
 */

// Маршруты
return [

    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

        'account/register' => [
            'controller' => 'account',
            'action' => 'register',
        ],

    'news/show' => [
            'controller' => 'news',
            'action' => 'show',
        ],
];