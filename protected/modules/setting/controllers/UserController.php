<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author francisco
 */
class UserController extends Auth {

  public $section_title = "Usuarios";

  public function actionIndex() {
    $this->csrf_token    = true;
    $this->current_title = "Listado";
    $this->render('index');
  }

  /**
   * list
   */
  public function actionlist() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $params['search'] = Yii::app()->request->getQuery("search", "");
      $params['order']  = Yii::app()->request->getQuery("order", "desc");

      $data = UsersUtil::getAllUsuarios($params);

      Response::JSON(FALSE, 200, "Usuarios obtenidos exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * listPersonal
   */
  public function actionListPersonal() {
    if (!Yii::app()->request->isAjaxRequest) {
      throw new Exception("Acceso no autorizado", 403);
    }
    $term = Yii::app()->request->getQuery("term");
    Response::JSON(false, 200, "", [
        "response" => [
            "items" => UsersUtil::getAll($term)
        ]
    ]);
  }

  /**
   * create
   */
  public function actionCreate() {
    $transaction = Yii::app()->db->beginTransaction();
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $post = Yii::app()->request->getPost("User");

      $model = UsersModel::model()->find("username = :uname and status is true", [
          ':uname' => $post['uname']
      ]);
      if (!$model) {
        $model                       = new UsersModel();
        $model->username             = $post['uname'];
        $model->auth_id              = 0;
        $model->date_registered      = Date::getDateTime();
        $model->must_change_password = 0;
        $model->password             = password_hash("default", PASSWORD_DEFAULT);

        if (!$model->save()) {
          throw new Exception(
          "Error al guardar usuario - " . Utils::handleErrorValidation($model), 900
          );
        }
      }

      $modelUR          = new UserRolesModel();
      $modelUR->user_id = $model->user_id;
      $modelUR->role_id = $post['rid'];

      if (!$modelUR->save()) {
        throw new Exception(
        "Error al guardar UR - " . Utils::handleErrorValidation($modelUR), 900
        );
      }

      $data['data'] = [];

      $transaction->commit();

      Response::JSON(FALSE, 200, "Usuario creado exitosamente", $data);
    } catch (Exception $exc) {
      $transaction->rollback();
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * update
   */
  public function actionUpdate() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $post = Yii::app()->request->getPost("User");

      $modelUR          = UserRolesModel::model()->findByPk($post['urid']);
      $modelUR->role_id = $post['rid'];

      if (!$modelUR->update()) {
        throw new Exception(
        "Error al actualizar UR - " . Utils::handleErrorValidation($modelUR), 900
        );
      }

      $data['data'] = [];

      Response::JSON(FALSE, 200, "Usuario actualizado exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * delete
   */
  public function actionDelete() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $id = Yii::app()->request->getPost("urid");

      $model         = UserRolesModel::model()->findByPk($id);
      $model->status = 0;

      if (!$model->update()) {
        throw new Exception(
        "Error al eliminar UR - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Usuario eliminado exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

}
