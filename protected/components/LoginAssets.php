<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class LoginAssets {

  public static $js      = ["js/login.signup.min.js"];
  public static $css     = [];
  public static $depends = ["espire", "jquery-validation","alertPlugin"];

  public static function registerScript($_this = false) {
      if($_this && $_this->id == "login" && $_this->action->id == "signup"){
      
        Yii::app()->clientScript->addPackage("login", [
            "baseUrl" => 'static',
            "js"      => self::$js,
            "css"     => self::$css,
            "depends" => self::$depends
        ]);
      }
  }

}
