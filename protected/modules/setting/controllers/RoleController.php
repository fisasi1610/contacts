<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoleController
 *
 * @author francisco
 */
class RoleController extends Auth {

  public $section_title = "Roles";

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

      $data = RolesUtil::getAll($params);

      Response::JSON(FALSE, 200, "Roles obtenidos exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * create
   */
  public function actionCreate() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $post = Yii::app()->request->getPost("Role");

      $model                   = new RolesModel();
      $model->role_name        = $post['rname'];
      $model->role_slug        = $post['rslug'];
      $model->role_description = $post['rdescription'];
      $model->status           = true;
      $model->role_status      = 1;

      if (!$model->save()) {
        throw new Exception(
        "Error al guardar rol - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Rol creado exitosamente", $data);
    } catch (Exception $exc) {
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

      $post = Yii::app()->request->getPost("Role");
      $id   = $post['rid'];

      $model                   = RolesModel::model()->findByPk($id);
      $model->role_name        = $post['rname'];
      $model->role_slug        = $post['rslug'];
      $model->role_description = $post['rdescription'];

      if (!$model->update()) {
        throw new Exception(
        "Error al guardar rol - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Rol actualizado exitosamente", $data);
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

      $id = Yii::app()->request->getPost("rid");

      $model         = RolesModel::model()->findByPk($id);
      $model->status = 0;

      if (!$model->update()) {
        throw new Exception(
        "Error al guardar rol - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Rol eliminado exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  public function actionPermissions() {
    $id                  = Yii::app()->request->getQuery("rid");
    $model               = RolesModel::model()->findByPk($id);
    $this->csrf_token    = true;
    $this->current_title = "Permisos del Rol {$model->role_name}";

    $this->render('permissions');
  }

  /**
   * listActions
   */
  public function actionlistPermissions() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $params['role_id'] = Yii::app()->request->getQuery("rid");
      $params['search']  = Yii::app()->request->getQuery("search", "");
      $params['order']   = Yii::app()->request->getQuery("order", "desc");

      $data = RolesUtil::getAllPermissionsByRol($params);

      Response::JSON(FALSE, 200, "Permisos obtenidos exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * AssignPermission
   */
  public function actionAssignPermission() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $role_id   = Yii::app()->request->getPost("rid");
      $action_id = Yii::app()->request->getPost("aid");

      $model            = new PermissionsModel();
      $model->action_id = $action_id;
      $model->role_id   = $role_id;

      if (!$model->save()) {
        throw new Exception(
        "Error al guardar permiso - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Permiso agregado exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

  /**
   * RemovePermission
   */
  public function actionRemovePermission() {
    try {
      if (!Yii::app()->request->isAjaxRequest) {
        throw new Exception("Acceso no autorizado", 403);
      }

      $id_permission = Yii::app()->request->getPost("pid");

      $model         = PermissionsModel::model()->findByPk($id_permission);
      $model->status = 0;

      if (!$model->update()) {
        throw new Exception(
        "Error al guardar permiso - " . Utils::handleErrorValidation($model), 900
        );
      }

      $data['data'] = $model->attributes;

      Response::JSON(FALSE, 200, "Permiso removido exitosamente", $data);
    } catch (Exception $exc) {
      Response::JSON(TRUE, $exc->getCode(), $exc->getMessage());
    }
  }

}
