<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <?php
      $form = $this->beginWidget('CActiveForm', [
          'id'          => 'form-search',
          'htmlOptions' => [
              'role'  => 'form',
              'class' => 'form-horizontal'
          ]
      ]);
      ?>
      <div class="card">
        <div class="card-heading border bottom">
          <h4 class="card-title">Datos de la Sesión</h4>
        </div>
        <div class="card-block pdd-right-30">
          <div class="row">
            <div class="col-6">
              <label>Nombre Completo</label><br/>
              <strong><?= Yii::app()->user->fullname ?></strong>
            </div>
            <div class="col-6">
              <label>Nombre Usuario</label><br/>
              <strong><?= Yii::app()->user->id ?></strong>
            </div>
          </div>
          <div class="row">
          </div>
        </div>
      </div>

      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>