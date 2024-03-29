<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Config
 */
return [
    /* Products */
    'products'                               => 'site/products',
    'product/<id:\d+>'                       => 'site/product',
    /* User */
    'changePassword'                         => 'user/password',
    /* Login */
    'signup'                                 => 'login/signup',
    'signin'                                 => 'login/validate',
    'logout'                                 => 'login/logout',
    /* System */
    '<controller:\w+>/<id:\d+>'              => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
];
