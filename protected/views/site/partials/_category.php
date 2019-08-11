<?php
$s = Yii::app()->request->getQuery("s","");
$m = Yii::app()->request->getQuery("m","");
$c = Yii::app()->request->getQuery("c","");
$categories = CategoriaQuery::getAll();
?>
<h3 class="my-4">Categorías</h3>
<div class="list-group">
  <?php foreach ($categories as $category): ?>
    <a href="<?= $this->createUrl("/products?s={$s}&c={$category['id']}&m={$m}") ?>" class="list-group-item <?= ($c == $category['id']) ? "active" : "" ?>"><?=$category["nombre"] ?></a>
  <?php endforeach; ?>
</div>
