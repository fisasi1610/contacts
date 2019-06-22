<div class="header navbar">
  <div class="header-container">
    <a class="navbar-brand" href="#">
      <img src="<?= Utils::host(Yii::app()->params["app-img-logo"], true); ?>" class="d-inline-block align-top" alt="">
    </a>
    <ul class="nav-right">
      <li class="user-profile dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">
          <img class="profile-img" height="38" width="38" src="<?= Utils::host(User::imagenProfile("XS"), true); ?>" alt="">
          <div class="user-info">
            <span class="name pdd-right-5">
              <?= Yii::app()->user->firstname ?>&nbsp;<?= Yii::app()->user->lastname ?>
            </span>
            <i class="ti-angle-down font-size-10"></i>
          </div>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?= Yii::app()->createUrl("/logout") ?>">
              <i class="ti-power-off pdd-right-10"></i>
              <span>Cerrar Sesión</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>