<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Config
 */
return [
    'gii'       => [
        'class'     => 'system.gii.GiiModule',
        'password'  => '123456',
        'ipFilters' => ['127.0.0.1', '::1'],
    ],
    'dashboard' => [
        'defaultController' => "overview"
    ],
    'setting' => [
        'defaultController' => "overview"
    ],
    'product' => [
        'defaultController' => "overview"
    ],
    'profile' => [
        'defaultController' => "overview"
    ],
];
