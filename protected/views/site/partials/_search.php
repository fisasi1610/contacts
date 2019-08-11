<?php
$s = Yii::app()->request->getQuery("s", "");
$m = Yii::app()->request->getQuery("m", "");
$c = Yii::app()->request->getQuery("c", "");

$form = $this->beginWidget('CActiveForm', [
    'id'          => 'form-search',
    'action'      => $this->createUrl("/products?c={$c}&m={$m}"),
    'method'      => 'get',
    'htmlOptions' => [
        'role' => 'form',
    ],
]);
?>
    <div class="input-group my-4">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-search"></i>
            </span>
        </div>
        <?=CHtml::textField("s", $s, [
    'class'        => "form-control",
    'autocomplete' => "off",
    'placeholder'  => "Buscar producto...",
]) ?>
    </div>
<?php $this->endWidget(); ?>