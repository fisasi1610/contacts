<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersUtil
 *
 * @author francisco
 */
class UsersUtil {

  public static function getAllUsuarios($params) {
    $data['total'] = UsersQuery::getAllUsuariosTotal($params);
    $row           = UsersQuery::getAllUsuarios($params);

    foreach ($row as $key => $value) {
      $row[$key]['nombres'] = Utils::formatting(ModelPersona::getData($value['uname'])['nombre_persona']);
    }

    $data['data'] = $row;

    return $data;
  }

  public static function getAll($term) {
    $models = ModelTrabajador::search($term);
    $data   = [];
    foreach ($models as $key => $value) {
      $data[$key]['id']   = $value['cod_per'];
      $data[$key]['text'] = Utils::formatting($value['nombres_persona']);
    }

    return $data;
  }

}
