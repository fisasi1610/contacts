 <?php 

class OverviewController extends Auth{

    public $section_title = "OverviewController";

    public function actionIndex() {
        $this->current_title = "Index";
        $this->render('index');
    }

}