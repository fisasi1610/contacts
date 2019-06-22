<?php

class OverviewController extends Auth {

  public $section_breadcrumbs = false;

  public function actionIndex() {
    $this->render('index');
  }

}
