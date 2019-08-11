<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RolesQuery
 *
 * @author francisco
 */
class RolesQuery {

  public static function getRoles($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("
              role_id as rid
              ,role_name as rname
              ,role_description as rdescription
              ,role_slug as rslug
              ,role_default as rdefault
              ")
      ->from("yak.bucket_roles")
      ->where(" status is true 
                and bucket_id = :bid
                and upper(
                      concat(
                        role_id,' '
                        ,role_name,' '
                        ,role_description,' '
                        ,role_slug)) 
                      like upper(:search)", [
          ":bid"    => $param['bid'],
          ":search" => $search
      ])
      ->order("role_id asc");

    return $command->queryAll();
  }

  public static function getRolesTotal($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("count(role_id)")
      ->from("yak.bucket_roles")
      ->where(" status is true 
                and bucket_id = :bid
                and upper(
                      concat(
                        role_id,' '
                        ,role_name,' '
                        ,role_description,' '
                        ,role_slug)) 
                      like upper(:search)", [
        ":bid"    => $param['bid'],
        ":search" => $search
    ]);

    return $command->queryScalar();
  }

  public static function getPermissionsByRol($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("
                per.permission_id as pid
                ,act.action_id as aid
                ,act.action_name as aname"
      )
      ->from("yak.actions act")
      ->leftJoin(
        "yak.bucket_permissions per", "
          act.action_id = per.action_id	
          and per.role_id = :role
          and per.status is true", [":role" => $param['role_id']]
      )
      ->where(" act.status is true 
                and upper(act.action_name) 
                      like upper(:search)", [":search" => $search])
      ->order("permission_id desc");

    return $command->queryAll();
  }

  public static function getPermissionsByRolTotal($param) {
    $search = "%{$param['search']}%";

    $command = Yii::app()->db->createCommand()
      ->select("count(act.action_id)")
      ->from("yak.actions act")
      ->leftJoin(
        "yak.bucket_permissions per", "
          act.action_id = per.action_id	
          and per.role_id = :role
          and per.status is true", [":role" => $param['role_id']]
      )
      ->where("act.status is true 
                and upper(act.action_name) 
                      like upper(:search)", [":search" => $search]);

    return $command->queryScalar();
  }

}
