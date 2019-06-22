<div class="side-nav">
  <div class="side-nav-inner">
    <div class="side-nav-logo">
      <a href="index.html">
        <div class="logo logo-dark" style="background-image: url('<?= Utils::host(Yii::app()->params["app-img-logo"], true); ?>')"></div>
        <div class="logo logo-white" style="background-image: url('<?= Utils::host(Yii::app()->params["app-img-logo-white"], true); ?>')"></div>
      </a>
      <div class="mobile-toggle side-nav-toggle">
        <a href="">
          <i class="ti-arrow-circle-left"></i>
        </a>
      </div>
    </div>
    <ul class="side-nav-menu scrollable">
      <li class="nav-item">
        <a class="mrg-top-30" href="<?= Yii::app()->createUrl("/") ?>">
          <span class="icon-holder">
            <i class="fa fa-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="mrg-top-30" href="<?= Yii::app()->createUrl("/") ?>">
          <span class="icon-holder">
            <i class="fa fa-book"></i>
          </span>
          <span class="title">Agenda</span>
        </a>
      </li>
    </ul>
  </div>
</div>