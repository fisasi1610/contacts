<?php
class AuthRoles
{

    public static $Auth = [
//        ['allow',
        //            'roles' => [],
        //            'users' => ['@'],
        //        ],
        ['allow',
            'controllers' => ["setting/categoria"],
            'users'       => ['@'],
        ],

    ];

}
