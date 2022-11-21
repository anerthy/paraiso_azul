<?php
headerAdmin($data);
getModal('modalTransportes', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-car-side"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['agregar']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Servicios / <a href="<?= base_url(); ?>/transportes"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableTransportes">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Clase</th>
                  <th>Tipo</th>
                  <th>Disponibilidad</th>
                  <th>Precio</th>
                  <th>Telefono</th>
                  <th>Status</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Hoo</td>
                  <td>descropcion</td>
                  <td>publico</td>
                  <td>terrestre</td>
                  <td>7854</td>
                  <td>44</td>
                  <td>2044</td>
                  <td>Activo</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>