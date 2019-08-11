<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaUtil
 *
 * @author francisco
 */
class CategoriaUtil {

  public static function getAllCategorias($params) {
    $data['total'] = CategoriaQuery::getAllCategoriasTotal($params);
    $data['data'] = CategoriaQuery::getAllCategorias($params);

    return $data;
  }

}
