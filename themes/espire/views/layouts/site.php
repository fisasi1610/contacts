<?php
PackagesAssets::registerCore();
SiteAssets::registerScript();
Yii::app()->clientScript->registerModuleScript("site");
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= $this->createUrl("/") ?>">TecShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio
                <span class="sr-only"></span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Acerca de Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contáctenos</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?= $this->createUrl("/login") ?>">Inicia Sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>   
      <div class="container">    
        <?= $content ?>
      </div>


    <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; TecShop <?= date("Y") ?></p>
    </div>
    <!-- /.container -->
  </footer>
  </body>
</html>