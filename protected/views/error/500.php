<?php if (APP_DEBUG): ?>
  <?php Console::log($error, false, "Track del Error"); ?>
<?php else: ?>
  <div class="authentication bg" style="background-image: url('<?= Utils::host(Yii::app()->params["app-img"] . "/others/img-32.jpg", true); ?>')">
    <div class="page-500 container">
      <div class="full-height">
        <div class="vertical-align full-height pdd-horizon-70">
          <div class="table-cell">
            <div class="text-center">
              <h1 class="font-size-100 text-white ls-3 lh-1"><b>500</b></h1>
              <p class="font-size-28 text-light text-white text-opacity lh-1-4 mrg-btm-30">Uh Sorry, something went<br class="hidden-sm hidden-xs">  wrong at our server.</p>
              <a href="<?=Yii::app()->createUrl("/")?>" class="btn btn-info">Back to Home</a>
            </div>
          </div>
        </div>
      </div>		
    </div>
  </div>
<?php endif; ?>