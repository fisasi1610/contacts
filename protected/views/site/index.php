<div class="row">

      <div class="col-lg-3">
        <?=$this->renderPartial("partials/_search") ?>
        <?=$this->renderPartial("partials/_category") ?>
        <?=$this->renderPartial("partials/_brands") ?>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <h3 class="my-4">Últimos Productos</h3>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php foreach ($products['last'] as $key => $ultimos): ?>
              <div class="carousel-item <?=($key == 0) ? "active" : "" ?>">
                <img class="d-block img-fluid" src="<?=ProductoUtil::validatePicture($ultimos['url_imagen']) ?>" width="450px" alt="<?= $key ?> slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?= $ultimos['nombre'] ?></h5>
                  <p><?= $ultimos['descripcion'] ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <h3 class="my-4">Nuestros Productos MÁS Votados</h3>
        <div class="row">
          <?php foreach ($products['top'] as $key => $voted): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="<?= $this->createUrl("/product/{$voted['id']}") ?>"><img class="card-img-top" src="<?=ProductoUtil::validatePicture($voted['url_imagen']) ?>" width="700px" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="<?= $this->createUrl("/product/{$voted['id']}") ?>"><?= $voted['nombre'] ?></a>
                  </h4>
                  <h5>$<?= number_format($voted['precio'],2) ?></h5>
                  <p class="card-text"><?= $voted['descripcion'] ?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->