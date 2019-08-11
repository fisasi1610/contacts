<?php
$this->breadcrumbs = [
    'Configuracion',
    'Usuarios'
];
?>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-heading border bottom">
            <h4 class="card-title">Listado</h4>
          </div>
          <div class="card-block">
            <div class="table-overflow">
              <button id="btn-create" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="top" title="Agregar Usuario"><i class="fa fa-plus"></i></button>
              <table class="table" id="tbUsers"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$this->renderPartial("modals/md-manage-create");
$this->renderPartial("modals/md-manage-update");
?>