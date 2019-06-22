<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Extensions\User
 */
class UserManager extends CWebUser {

  public $logoutUrl;

  public function init() {
    parent::init();
    $this->logoutUrl = Yii::app()->baseUrl . "/logout";
    $this->loginUrl  = Yii::app()->baseUrl . "/{$this->loginUrl}";

    if (
      (!$this->isGuest && APP_ENVIROMENT == Environments::DEVELOPMENT) ||
      ($this->isGuest && APP_ENVIROMENT == Environments::DEVELOPMENT)
    ) {
      defined('APP_DEBUG') or define('APP_DEBUG', true);
    } else {
      defined('APP_DEBUG') or define('APP_DEBUG', false);
    }
  }

}
