<?php echo " <?php\n" ?>

class Assets extends AssetsBundle 
{
  public $js      = [];
  public $css     = [];
  public $depends = [];

  /**
    *
    * @var type 
    */
  public $controller = [
    "overview" => [
      "js"      => [],
      "css"     => [],
      "depends" => [],
    ]
  ];
  
  public $action     = [
    "overview.index"  => [
      "js"      => [],
      "css"     => [],
      "depends" => [],
    ]
  ];
}