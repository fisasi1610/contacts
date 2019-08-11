<!-- Page Heading -->
<h1 class="my-4">Listado de Productos
<small></small>
</h1>
<div class="row mb-4">

      <div class="col-lg-3">
        <?=$this->renderPartial("partials/_search") ?>
        <?=$this->renderPartial("partials/_category") ?>
        <?=$this->renderPartial("partials/_brands") ?>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row my-4">
            <?php if ($data['total'] == 0): ?>
                <div class="col-lg-12 col-sm-12 mb-4">
                    <h1>No se han encontrado resultados...</h1>
                </div>
            <?php endif; ?>
            <?php foreach ($data['rows'] as $producto): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100">
                    <a href="<?=$this->createUrl("/product/{$producto['id']}") ?>"><img class="card-img-top" src="<?=ProductoUtil::validatePicture($producto['url_imagen']) ?>" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="<?=$this->createUrl("/product/{$producto['id']}") ?>"><?=$producto['nombre'] ?></a>
                        </h4>
                        <p class="card-text"><?=$producto['descripcion'] ?></p>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /.row -->

        <?php 
            if ($data['total'] > 0): 
                $s = Yii::app()->request->getQuery("s", "");
                $m = Yii::app()->request->getQuery("m", "");
                $c = Yii::app()->request->getQuery("c", "");
                $p = Yii::app()->request->getQuery("p",1);
            ?>
            <!-- Pagination -->
            <ul class="pagination justify-content-center">
                <?php for($i = 1; $i<=$pages->getPageCount(); $i++): ?>
                    <li class="page-item <?= ($p == $i) ?"active": "" ?>">
                        <a class="page-link" href="<?= $this->createUrl("/products?s={$s}&c={$c}&m={$m}&p={$i}") ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>                             
            </ul>
        <?php endif; ?>
    </div>
</div>