<section class="modal" id="md-manage-create" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modal-title">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $form = $this->beginWidget('CActiveForm', [
            'id'          => 'form-manage-create',
            'htmlOptions' => [
                'role' => 'form',
            ]
        ]);
        ?>
        <div class="row m-t-15">
          <div class="col-12">
            <div class="form-group">
              <label for="Role_name">Nombre del Rol</label>
              <?= CHtml::textField("Role[rname]", "", ['class' => "form-control"]) ?>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-12">
            <div class="form-group">
              <label for="Role_slug">Slug del Rol</label>
              <?= CHtml::textField("Role[rslug]", "", ['class' => "form-control"]) ?>
            </div>
          </div>
        </div>
        <div class="row m-b-15">
          <div class="col-12">
            <div class="form-group">
              <label for="Role_description">Descripción del Rol</label>
              <?= CHtml::textArea("Role[rdescription]", "", ['class' => "form-control"]) ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-right">
            <button type="button" id="btn-save" class="btn btn-success">Guardar</button>
            <button type="button" id="btn-close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</section>