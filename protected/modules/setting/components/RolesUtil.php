<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RolesUtil
 *
 * @author francisco
 */
class RolesUtil {

  public static function getAll($params) {
    $data['total'] = RolesQuery::getRolesTotal($params);
    $data['data']  = RolesQuery::getRoles($params);

    return $data;
  }

  public static function getAllPermissionsByRol($params) {
    $data['total'] = RolesQuery::getPermissionsByRolTotal($params);
    $data['data']  = RolesQuery::getPermissionsByRol($params);
    
    return $data;
  }

}
