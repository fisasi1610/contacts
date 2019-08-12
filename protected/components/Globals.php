<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class Globals
{


    const SECRET          = "eZiYIWw0";
    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;
    const ITEMS_PER_PAGE = 6;

    /**
     * ARCHIVO DE ACCESO
     */
    const ACCESS_FILE = "access.csv";

    /**
     *
     */
    const NAVIGATION_LEVEL_ONE   = 1;
    const NAVIGATION_LEVEL_TWO   = 2;
    const NAVIGATION_LEVEL_THREE = 3;

  /**
   * TIPOS DE PARAMETROS
   */
  const TIPO_DOCUMENTO = "TIPO_DOCUMENTO";
  const TIPO_PERSONA = "TIPO_PERSONA";
  

  public static function getTypes($type, $value = false, $params = false) {

    $andWhere = "1=1";
    if ($value) {
      $andWhere = "s.valor = '{$value}'";
    }

    $queryParams = "";
    if ($params) {
      foreach ($params as $key => $value) {
        if ($key == self::QUERY_NOT_IN) {
          $not_in_concatenado = "";
          foreach ($value as $row) {
            $not_in_concatenado .= "'{$row}',";
          }
          $not_in_concatenado_final = substr($not_in_concatenado, 0, strlen($not_in_concatenado) - 1);
          $queryParams              = "s.valor NOT IN ({$not_in_concatenado_final})";
        } elseif ($key == self::QUERY_IN) {
          $in_concatenado = "";
          foreach ($value as $row) {
            $in_concatenado .= "'{$row}',";
          }
          $in_concatenado_final = substr($in_concatenado, 0, strlen($in_concatenado) - 1);
          $queryParams          = "s.valor IN ({$in_concatenado_final})";
        }
      }
    }

    return Yii::app()->db->createCommand()
        ->select(
          "s.id as id_log
          , s.clave
          , s.nombre as name
          , s.valor as id, s.condicional as condition"
        )
        ->from("parametro s")
        ->where("s.clave = :type", [":type" => $type])
        ->andWhere("s.estado = :state", [":state" => self::STATUS_ACTIVE])
        ->andWhere($andWhere)
        ->andWhere($queryParams)
        //->order("cast(s.valor as integer)  asc")
        ->queryAll();
  }

  public static function getTypeListData($type, $params = false) {
    return CHtml::listData(self::getTypes($type, false, $params), "id", "name");
  }

}
