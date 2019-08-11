<?php

class CategoriaQuery
{
    public static function getAll($params = [])
    {
        // $search = "%{$param['search']}%";

        $command = Yii::app()->db->createCommand()
            ->select("c.id
              ,c.nombre")
            ->from("categoria c")
            ->where(" c.estado = 1
                and upper(
                      concat(
                        c.id,' '
                        ,c.nombre,' '))")
        //   like upper(:search)", [":search" => $search])
            ->order("c.id asc");

        return $command->queryAll();
    }
}
