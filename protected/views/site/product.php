<div class="row">

    <div class="col-lg-3">
        <?=$this->renderPartial("partials/_search") ?>
        <?=$this->renderPartial("partials/_category") ?>
        <?=$this->renderPartial("partials/_brands") ?>
    </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?=ProductoUtil::validatePicture($data['url_imagen']) ?>" width="500px" alt="">
          <div class="card-body">
            <h3 class="card-title"><?= $data['nombre'] ?></h3>
            <h4>$<?= number_format($data['precio'],2) ?></h4>
            <p class="card-text"><?= $data['descripcion'] ?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>