<?php

class Assets extends AssetsBundle {

    public $js      = [];
    public $css     = [];
    public $depends = [];

    /**
     *
     * @var type 
     */
    public $controller = [
        "overview" => [
            "js"      => ["overview.min.js"],
            "css"     => ["overview.min.css"],
            "depends" => [],
        ]
    ];
    public $action     = [
        "overview.index"  => [
            "js"      => [],
            "css"     => [],
            "depends" => [],
        ],
    ];

}