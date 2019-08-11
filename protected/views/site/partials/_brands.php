<?php
$s = Yii::app()->request->getQuery("s","");
$c = Yii::app()->request->getQuery("c","");
$m = Yii::app()->request->getQuery("m","");
$brands = MarcaQuery::getAll();
?>
<h3 class="my-4">Marcas</h3>
<div class="list-group">
<?php foreach ($brands as $brand): ?>
    <a href="<?= $this->createUrl("/products?s={$s}&c={$c}&m={$brand['id']}") ?>" class="list-group-item <?= ($m == $brand['id']) ? "active" : "" ?>"><?=$brand["nombre"] ?></a>
  <?php endforeach; ?>
</div>
