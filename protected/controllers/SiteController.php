<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteController
 *
 * @author Franco
 */
class SiteController extends Auth
{

    public $layout = "//layouts/site";

    public function actionIndex()
    {
        $products = [
            "top"  => ProductoQuery::getTop(),
            "last" => ProductoQuery::getLast(),
        ];

        $this->render("index", ["products" => $products]);
    }

    public function actionProducts($s = false, $c = false, $m = false, $p = 1)
    {
        $offset  = ($p == 1) ? 0 : ($p-1)+(int)Globals::ITEMS_PER_PAGE;
        $params = [
            "s" => $s,
            "c" => $c,
            "m" => $m,
            "o" => $offset,
        ];
        $data = ProductoQuery::getAll($params);

        $pages = new CPagination($data['total']);
        $pages->setPageSize($data['limit']);

        $this->render("products", ["data" => $data, "pages" => $pages]);
    }

    public function actionProduct($id)
    {
        $data = ProductoQuery::get($id);
        $this->render("product", ["data" => $data]);
    }

}
