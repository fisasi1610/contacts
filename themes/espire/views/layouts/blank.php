<?php
PackagesAssets::registerCore();
AppAssets::registerScript();
Yii::app()->clientScript->registerModuleScript("app");
$flashes = Yii::app()->user->getFlashes();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />

    <!-- Title -->
    <title><?= CHtml::encode($this->pageTitle) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= Utils::host(Yii::app()->params["app-img-favicon"], true) ?>"/>
    <link rel="icon" type="image/x-icon" href="<?= Utils::host('favicon.ico', true) ?>" />
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-database.js"></script>
    <script type="text/javascript">
      var Request = {
        Host: '<?= Yii::app()->request->hostInfo ?>',
        BaseUrl: '<?= Yii::app()->baseUrl ?>',
        themeUrl: '<?= Yii::app()->theme->baseUrl ?>',
        _GET: <?= json_encode($_GET) ?>,
        UrlHash: {
          m: '<?= (!isset($this->module->id)) ? '' : $this->module->id ?>',
          c: '<?= ($this->id) ?>',
          a: '<?= ($this->action->id) ?>'
        }
      };
    </script>
  </head>
  <body class="">
    <!-- Pace START -->
    <div id="svays-preload" class="preload">
      <div class="spinner"></div>
    </div>
    <!-- Pace END -->
    <div class="app side-nav-dark">
      <div class="layout">
        <!-- Page Container START -->
        <div class="page-container">
          <!-- Content Wrapper START -->
          <div class="main-content <?=(!$this->section_breadcrumbs)?" not-breadcrumbs ":""?>  <?=(!$this->current_title)?" not-title ":""?>">
            <div class="<?= ($this->container_fluid) ? " container-fluid " : " container " ?>">
              <?= $content ?>
            </div>
          </div>
          <!-- Content Wrapper END -->
        </div>
      </div>
    </div>
  </body>
</html>
