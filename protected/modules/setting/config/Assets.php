<?php

class Assets extends AssetsBundle
{

    public $js      = [];
    public $css     = [];
    public $depends = [];

    /**
     *
     * @var type
     */
    public $controller = [
        // "role" => [
        //     "js"      => ["role.min.js"],
        //     "css"     => [],
        //     "depends" => [],
        // ],
        // "user" => [
        //     "js"      => ["user.min.js"],
        //     "css"     => [],
        //     "depends" => [],
        // ],
    ];
    public $action = [
        //   "role.index" => [
         //       "js"      => ["role.index.min.js"],
         //       "css"     => [],
         //       "depends" => ["select2", "jquery-validation", "tablePlugin", "alertPlugin", "ajaxPlugin", "formPlugin", "modalPlugin"]
         //   ],
         //   "role.permissions" => [
         //       "js"      => ["role.permissions.min.js"],
         //       "css"     => [],
         //       "depends" => ["tablePlugin", "alertPlugin", "ajaxPlugin", "formPlugin"]
         //   ],
         //   "user.index" => [
         //       "js"      => ["user.index.min.js"],
         //       "css"     => [],
         //       "depends" => ["select2", "jquery-validation", "tablePlugin", "alertPlugin", "ajaxPlugin", "formPlugin", "modalPlugin"]
         //   ],
         "categoria.index" => [
            "js"      => ["categoria.index.min.js"],
            "css"     => [],
            "depends" => ["select2", "jquery-validation", "tablePlugin", "alertPlugin", "ajaxPlugin", "formPlugin", "modalPlugin"],
        ],
    ];

}
