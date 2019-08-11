<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersQuery
 *
 * @author francisco
 */
class UsersQuery {

  public static function getAllUsuarios($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("
              ur.userrole_id as urid
              ,ur.user_id as uid
              ,ur.role_id as rid
              ,usr.username as uname
              ,rol.role_name as rname
              ")
      ->from("yak.user_roles ur")
      ->join(
        "yak.users usr", "
          usr.user_id = ur.user_id	
          and usr.status is true"
      )
      ->join(
        "yak.roles rol", "
          rol.role_id = ur.role_id	
          and rol.status is true"
      )
      ->where(" ur.status is true 
                and upper(
                      concat(
                        ur.role_id,' '
                        ,usr.username,' '
                        ,rol.role_name,' '
                        ,ur.user_id)) 
                      like upper(:search)", [":search" => $search])
      ->order("userrole_id asc");

    return $command->queryAll();
  }

  public static function getAllUsuariosTotal($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("count(ur.userrole_id)")
      ->from("yak.user_roles ur")
      ->join(
        "yak.users usr", "
          usr.user_id = ur.user_id	
          and usr.status is true"
      )
      ->join(
        "yak.roles rol", "
          rol.role_id = ur.role_id	
          and rol.status is true"
      )
      ->where(" ur.status is true 
                and upper(
                      concat(
                        ur.role_id,' '
                        ,usr.username,' '
                        ,rol.role_name,' '
                        ,ur.user_id)) 
                      like upper(:search)", [":search" => $search]);

    return $command->queryScalar();
  }

}
