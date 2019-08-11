<?php
$this->breadcrumbs = [
    "Configuracion",
    "Roles"         => $this->createUrl("/setting/role"),
    "Permisos"
];
?>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-heading border bottom">
            <h4 class="card-title">Permisos</h4>
          </div>
          <div class="card-block">
            <div class="table-overflow">
              <table class="table" id="tbRolePermissions"></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>