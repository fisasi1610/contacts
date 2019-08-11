<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Controllers
 */
class LoginController extends Auth
{

    public $layout = "//layouts/login";

    public function actionIndex($continue = false)
    {
        $this->render("index", ["model" => (new LoginModel), "continue" => $continue]);
    }

    public function actionValidate($continue = false)
    {

        if ($post = Yii::app()->request->getPost("LoginModel")) {
            $model = new LoginModel;
            $model->setAttributes($post);

            if ($model->validate() && $model->login()) {
                if ($continue) {
                    $this->redirect(rawurldecode($continue));
                }

                $this->redirect(["/dashboard"]);
            } else {
                yii::app()->user->setFlash("errorLogin", $model->errors);
                if ($continue) {
                    $this->redirect(["/login?continue=" . rawurlencode($continue)]);
                }

                $this->redirect(["/login"]);
            }
        } else {
            throw new CHttpException(404, "Página No Encontrada");
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect(["/"]);
    }

    public function beforeAction($action)
    {
        if (!Yii::app()->user->isGuest && ($this->action->id !== "logout")) {
            $this->redirect(["/dashboard"]);
        }
        return true;
    }

    public function actionSignup()
    {
        $persona = Yii::app()->request->getPost("Persona");
        $usuario = Yii::app()->request->getPost("Usuario");
        // Console::log([$persona, $usuario], true);
        if ($persona && $usuario) {
          $transaction = Yii::app()->db->beginTransaction();
          try {
            
            $modelPersona = new PersonaModel();
            $modelPersona->attributes = $persona;

            if(!$modelPersona->save()){
              throw new Exception("Error al guardar Persona - ".Utils::handleErrorValidation($modelPersona), 900);
            }

            $modelUsuario = new UsuarioModel();
            $modelUsuario->persona_id = $modelPersona->id;
            $modelUsuario->usuario = $modelPersona->correo;
            $modelUsuario->clave = password_hash($usuario["password"],PASSWORD_DEFAULT);

            if(!$modelUsuario->save()){
              throw new Exception("Error al guardar Usuario - ".Utils::handleErrorValidation($modelUsuario), 900);
            }

            $transaction->commit();
            yii::app()->user->setFlash("success", "Cuenta Creada, proceda a Logearse.");
            $this->redirect(["/login"]);
          } catch (Exception $ex) {
            $transaction->rollback();
            Response::Error($ex, false);
          }
        }
        Console::log([$persona, $usuario], true);
        $this->render("signup", []);
    }

    public function actionValidateEmail()
    {
        try {
            if (!Yii::app()->request->isAjaxRequest) {
                throw new Exception("Acceso no autorizado", 403);
            }

            $email = Yii::app()->request->getQuery("search", "");

            $data = User::validateEmail($email);

            echo ($data);
        } catch (Exception $exc) {
            echo ("false");
        }
    }

}
