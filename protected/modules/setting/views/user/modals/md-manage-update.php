<section class="modal" id="md-manage-update" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modal-title">Actualizar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $form = $this->beginWidget('CActiveForm', [
            'id'          => 'form-manage-update',
            'htmlOptions' => [
                'role' => 'form',
            ]
        ]);
        ?>
        <div class="row m-t-15 m-b-15">
          <div class="col-12">
            <div class="form-group">
              <label for="User_username">Nombre del Usuario</label>
              <?=
              Chtml::hiddenField('User[urid]', '', [
                  "data-field" => "urid"
              ]);
              ?>
              <?=
              CHtml::textField("User[uname]", "", [
                  'class'      => "form-control",
                  'disabled'   => true,
                  'data-field' => 'uname'
              ])
              ?>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="User_role_id">Rol del Usuario</label>
              <?=
              CHtml::dropDownList(
                "User[rid]", "", CHtml::listData(
                  RolesModel::model()->findAll("
                      status is true"
                  ), "role_id", "role_name"), [
                  'class'      => "form-control",
                  'empty'      => "Seleccione...",
                  "data-field" => "rid"
              ])
              ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-right">
            <button 
              type="button" 
              id="btn-save" 
              class="btn btn-success">
              Actualizar
            </button>
            <button 
              type="button" 
              id="btn-close" 
              class="btn btn-default" 
              data-dismiss="modal">
              Cerrar
            </button>
          </div>
        </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</section>