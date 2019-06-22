<?php echo " <?php \n" ?>

class OverviewController extends Auth
{
  public function actionIndex() 
  {
    $this->render('index');
  }
}