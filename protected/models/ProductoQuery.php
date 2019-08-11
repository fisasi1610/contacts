<?php

class ProductoQuery
{
    public static function getTop()
    {
        $command = Yii::app()->db->createCommand()
            ->select("p.id
          ,p.nombre
          ,p.descripcion
          ,p.precio
          ,p.url_imagen")
            ->from("producto p")
            ->where(" p.estado = 1")
            ->limit(3)
            ->order("p.fecha_creacion desc");

        return $command->queryAll();

    }

    public static function getLast()
    {
        $command = Yii::app()->db->createCommand()
            ->select("p.id
              ,p.nombre
              ,p.descripcion
              ,p.precio
              ,p.url_imagen")
            ->from("producto p")
            ->where(" p.estado = 1")
            ->limit(3)
            ->order("p.fecha_creacion desc");

        return $command->queryAll();
    }

    public static function get($id)
    {
        $command = Yii::app()->db->createCommand()
            ->select("p.id
              ,p.nombre
              ,p.descripcion
              ,p.precio
              ,p.url_imagen")
            ->from("producto p")
            ->where(" p.estado = 1 and p.id = :id", [":id" => $id]);

        return $command->queryRow();
    }

    public static function getAllCommand($params){
        $command = Yii::app()->db->createCommand()
            ->select("p.id
              ,p.nombre
              ,p.descripcion
              ,p.precio
              ,p.url_imagen")
            ->from("producto p")
            ->where(" p.estado = 1");
        if (isset($params['s']) && $params['s'] != "") {
            $search = "%{$params['s']}%";
            $command->andWhere("upper(
                    concat(
                        p.id,' '
                        ,p.nombre,' '
                        ,p.modelo,' '
                        ,p.descripcion,' '
                      ,p.caracteristica,' ')) like upper(:search)", [":search" => $search]);
        }
        if (isset($params['m']) && $params['m'] != "") {
            $command->andWhere("p.marca = :marca", [":marca" => $params['m']]);
        }
        if (isset($params['c']) && $params['c'] != "") {
            $command->andWhere("p.categoria = :categoria", [":categoria" => $params['c']]);
        }

        return $command;
    }

    public static function getAll($params)
    {
        $limit   = (int)Globals::ITEMS_PER_PAGE;
        $data["limit"] = $limit;

        $command = self::getAllCommand($params);
        $data["total"] = count($command->queryAll());

        $commandLimit = self::getAllCommand($params);
        $commandLimit->limit($limit)
            ->offset($params['o']);
        $data["rows"] = $commandLimit->queryAll();

        return $data;
    }
}
