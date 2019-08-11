<section
  class="modal"
  id="md-manage-create"
  data-backdrop="static"
  tabindex="-1"
  role="dialog"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modal-title">Nueva Categoría</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close">
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body">
        <?php
$form = $this->beginWidget('CActiveForm', [
    'id'          => 'form-manage-create',
    'htmlOptions' => [
        'role' => 'form',
    ],
]);
?>
        <div class="row m-t-15 m-b-15">
          <div class="col-12">
            <div class="form-group">
              <label for="User_uname">Nombre de la Categoría</label>
            <?=
CHtml::textField(
    "Categoria[nombre]", "", [], [
        'class' => "form-control",
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
              Guardar
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