<?php

class PackagesAssets
{

    public static $packages = [
        'moment'                => [
            'baseUrl' => 'static/third_party/moment/min',
            'js'      => ['moment-with-locales.min.js'],
            'depends' => [],
        ],
        'jquery'                => [
            'baseUrl' => 'static/third_party/jquery/dist',
            'js'      => ['jquery.min.js'],
            'depends' => [],
        ],
        'popper'                => [
            'baseUrl' => 'static/third_party/popper.js/dist',
            'js'      => [
                'umd/popper.min.js',
            ],
            'depends' => ["jquery"],
        ],
        'bootstrap'             => [
            'baseUrl' => 'static/third_party/bootstrap/dist/',
            'js'      => ['js/bootstrap.bundle.min.js'],
            'css'     => ['css/bootstrap.min.css'],
            'depends' => ['jquery'],
        ],
        'pace'                  => [
            'baseUrl' => 'static/third_party/pace-js/',
            'js'      => ['pace.min.js'],
            'depends' => [''],
        ],
        'perfect-scrollbar'     => [
            'baseUrl' => 'static/third_party/perfect-scrollbar/',
            'js'      => ['dist/perfect-scrollbar.min.js'],
            'css'     => ['css/perfect-scrollbar.css'],
            'depends' => [''],
        ],
        'noty'                  => [
            'baseUrl' => 'static/third_party/noty/lib',
            'js'      => ['noty.js'],
            'css'     => ['noty.css'],
            'depends' => ["bootstrap"],
        ],
        'bootstrap-table'       => [
            'baseUrl' => 'static/third_party/bootstrap-table/dist',
            'js'      => [
                'bootstrap-table.min.js',
                'extensions/export/bootstrap-table-export.min.js',
                'locale/bootstrap-table-es-ES.min.js'],
            'css'     => ['bootstrap-table.min.css'],
            'depends' => ["espire"],
        ],
        "formPlugin"            => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['FormPlugin.min.js'],
            'depends' => ["espire"],
        ],
        'axios'                 => [
            'baseUrl' => 'static/third_party/axios/dist',
            'js'      => ['axios.min.js'],
            'css'     => [],
            'depends' => [],
        ],
        "tablePlugin"           => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['TablePlugin.min.js'],
            'depends' => ['bootstrap-table'],
        ],
        "alertPlugin"           => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['AlertPlugin.min.js'],
            'depends' => ["sweetalert"],
        ],
        "ajaxPlugin"            => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['AjaxPlugin.min.js'],
            'depends' => ["axios"],
        ],
        "modalPlugin"           => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['ModalPlugin.min.js'],
            'depends' => ["boostrap"],
        ],
        'animate-css'           => [
            'baseUrl' => 'static/third_party/animate.css',
            'js'      => [],
            'css'     => ['animate.min.css'],
            'depends' => ['jquery'],
        ],
        'espire'                => [
            'baseUrl' => 'static',
            'js'      => ['js/app.min.js'],
            'css'     => [
                'css/ei-icon.min.css',
                'css/themify-icons.min.css',
                'css/font-awesome.min.css',
                'css/app.min.css'],
            'depends' => [
                'jquery',
                'moment',
                'bootstrap',
                'animate-css',
                'pace',
                'perfect-scrollbar',
                'noty',
            ],
        ],
        'jquery-validation'     => [
            'baseUrl' => 'static/third_party/jquery-validation',
            'js'      => [
                'dist/jquery.validate.min.js',
                'dist/additional-methods.min.js',
                'dist/localization/messages_es_PE.js',
            ],
            'depends' => ["jquery"],
        ],
        'sweetalert'            => [
            'baseUrl' => 'static/third_party/sweetalert2/dist',
            'js'      => ['sweetalert2.min.js'],
            'css'     => ['sweetalert2.min.css'],
            'depends' => ["jquery"],
        ],
        "alertPlugin"           => [
            'baseUrl' => 'static/plugins/nolbertovilchez',
            'js'      => ['AlertPlugin.min.js'],
            'depends' => ["sweetalert"],
        ],
        "select2"               => [
            "baseUrl" => 'static/third_party/select2/dist',
            'js'      => ["js/select2.min.js", 'js/i18n/es.js'],
            'css'     => ["css/select2.min.css"],
            'depends' => ["jquery"],
        ],
        "bootstrap-colorpicker" => [
            "baseUrl" => 'static/third_party/bootstrap-colorpicker/dist',
            'js'      => ["js/bootstrap-colorpicker.min.js"],
            'css'     => ["css/bootstrap-colorpicker.min.css"],
            'depends' => ["bootstrap"],
        ],
        "nestable"              => [
            "baseUrl" => 'static/third_party/nestable2/dist',
            "js"      => ['jquery.nestable.min.js'],
//          "css"     => ['jquery.nestable.min.css'],
             "depends" => ["jquery"],
        ],
        "chart"                 => [
            'baseUrl' => 'static/third_party/chart.js/dist',
            'js'      => ['Chart.min.js'],
            'depends' => ['jquery'],
        ],
        "jquery-contextmenu"    => [
            'baseUrl' => 'static/third_party/jquery-contextmenu/dist',
            'css'     => ["jquery.contextMenu.min.css"],
            'js'      => ['jquery.contextMenu.min.js', 'jquery.ui.position.min.js'],
            'depends' => ['jquery'],
        ],
        "bootstrap-datepicker"  => [
            "baseUrl" => 'static/third_party/bootstrap-datepicker/dist',
            "js"      => [
                'js/bootstrap-datepicker.min.js',
                'locales/bootstrap-datepicker.es.min.js'],
            "css"     => ['css/bootstrap-datepicker.min.css'],
            "depends" => ["bootstrap"],
        ],
    ];

    public static function registerCore()
    {
        foreach (self::$packages as $package => $scripts) {
            Yii::app()->clientScript->addPackage($package, $scripts);
        }

        Yii::app()->clientScript->coreScriptPosition        = CClientScript::POS_END;
        Yii::app()->clientScript->defaultScriptFilePosition = CClientScript::POS_END;
    }

}
