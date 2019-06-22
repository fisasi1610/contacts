<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Controllers
 */
class LoginController extends Auth {

  public $layout = "//layouts/login";

  public function actionIndex($continue = false) {
    $this->render("index", ["model" => (new LoginModel), "continue" => $continue]);
  }

  public function actionValidate($continue = false) {

    if ($post = Yii::app()->request->getPost("LoginModel")) {
      $model = new LoginModel;
      $model->setAttributes($post);

      if ($model->validate() && $model->login()) {
        if ($continue)
          $this->redirect(rawurldecode($continue));

        $this->redirect(["/dashboard"]);
      } else {
        yii::app()->user->setFlash("errorLogin", $model->errors);
        if ($continue)
          $this->redirect(["/login?continue=" . rawurlencode($continue)]);

        $this->redirect(["/login"]);
      }
    } else {
      throw new CHttpException(404, "Página No Encontrada");
    }
  }

  public function actionLogout() {
    Yii::app()->user->logout(false);
    $this->redirect(["/login"]);
  }

  public function beforeAction($action) {
    if (!Yii::app()->user->isGuest && ($this->action->id !== "logout")) {
      $this->redirect(["/dashboard"]);
    }
    return true;
  }

}
