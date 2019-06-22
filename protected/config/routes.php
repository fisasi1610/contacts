<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Config
 */
return [
    /* Products */
    'products'                               => 'product/overview/index',
    'product/new'                            => 'product/manage/create',
    'product/edit/<id:\d+>'                  => 'product/manage/update',
    'product/remove/<id:\d+>'                => 'product/manage/delete',
    /* User */
    'changePassword'                         => 'user/password',
    /* Login */
    'signin'                                 => 'login/validate',
    'logout'                                 => 'login/logout',
    /* System */
    '<controller:\w+>/<id:\d+>'              => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
];
