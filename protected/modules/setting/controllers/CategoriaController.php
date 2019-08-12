<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author francisco
 */
class CategoriaController extends Auth
{

    public $section_title = "Categorias";

    public function actionIndex()
    {
        $this->csrf_token    = true;
        $this->current_title = "Categoría";
        $this->render('index');
    }

    /**
     * list
     */
    public function actionlist()
    {
        try {
            if (!Yii::app()->request->isAjaxRequest) {
                throw new Exception("Acceso no autorizado", 403);
            }

            $params['search'] = Yii::app()->request->getQuery("search", "");
            $params['order']  = Yii::app()->request->getQuery("order", "desc");

            $data = CategoriaUtil::getAllCategorias($params);

            Response::JSON(false, 200, "Categorías obtenidas exitosamente", $data);
        } catch (Exception $exc) {
            Response::JSON(true, $exc->getCode(), $exc->getMessage());
        }
    }

    /**
     * update
     */
    public function actionUpdate()
    {
        try {
            if (!Yii::app()->request->isAjaxRequest) {
                throw new Exception("Acceso no autorizado", 403);
            }

            $post = Yii::app()->request->getPost("Categoria");

            $model            = CategoriaModel::model()->findByPk($post['id']);
            $model->attribute = $post;

            if (!$modelUR->update()) {
                throw new Exception(
                    "Error al actualizar Categoría - " . Utils::handleErrorValidation($model), 900
                );
            }

            $data['data'] = [];

            Response::JSON(false, 200, "Categoría actualizado exitosamente", $data);
        } catch (Exception $exc) {
            Response::JSON(true, $exc->getCode(), $exc->getMessage());

        }
    }

    /**
     * delete
     */
    public function actionDelete()
    {
        try {

            //Console::debug(Yii::app()->request->isAjaxRequest, true);

            if (!Yii::app()->request->isAjaxRequest) {
                throw new Exception("Acceso no autorizado", 403);
            }

            $id = Yii::app()->request->getPost("id");

            $model         = CategoriaModel::model()->findByPk($id);
            $model->estado = 0;

            if (!$model->update()) {
                throw new Exception(
                    "Error al eliminar Categoria - " . Utils::handleErrorValidation($model), 900
                );
            }

            $data['data'] = $model->attributes;

            Response::JSON(false, 200, "Categoria eliminado exitosamente", $data);
        } catch (Exception $exc) {
            Response::Error($exc);
        }
    }

}
