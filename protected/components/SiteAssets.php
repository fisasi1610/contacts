<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class SiteAssets {

  public static $js      = [];
  public static $css     = [
    'css/font-awesome.min.css',
    'css/site.min.css'
  ];
  public static $depends = ["bootstrap"];

  public static function registerScript() {
    Yii::app()->clientScript->addPackage("site", [
        "baseUrl" => 'static',
        "js"      => self::$js,
        "css"     => self::$css,
        "depends" => self::$depends
    ]);
  }

}
