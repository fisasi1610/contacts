<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaQuery
 *
 * @author francisco
 */
class CategoriaQuery
{

    public static function getAllCategorias($param)
    {
        $search = "%{$param['search']}%";

        $command = Yii::app()->db->createCommand()
            ->select("c.id
              ,c.nombre")
            ->from("c.categoria")
            ->where(" c.estado = 1
                and upper(
                      concat(
                        c.id,' '
                        ,c.nombre,' '))
                      like upper(:search)", [":search" => $search])
            ->order("c.id asc");

        return $command->queryAll();
    }

    public static function getAllCategoriasTotal($param)
    {
        $search = "%{$param['search']}%";

        $command = Yii::app()->db->createCommand()
            ->select("count(c.id)")
            ->from("categoria c")
            ->where(" c.estado = 1
                and upper(
                      concat(
                        c.id,' '
                        ,c.nombre,' '))
                      like upper(:search)", [":search" => $search]);

        return $command->queryScalar();
    }

}
