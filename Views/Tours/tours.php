<?php
headerAdmin($data);
getModal('modalTours', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-building"></i> <?= $data['page_title'] ?>
        <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/tours"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableTours">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Servicio</th>
                  <!-- <th>Actividad</th>
                  <th>Alimentacion</th>
                  <th>Hospedaje</th>
                  <th>Transporte</th>
                  <th>Lugar</th>
                  <th>Disponibilidad</th> -->
                  <th>Inicio</th>
                  <!-- <th>Duracion</th>
                  <th>Minimo</th> -->
                  <th>Telefono</th>
                  <th>Precio</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Patitos</td>
                  <td>PatitosDescripcion</td>
                  <td>PatitosServicio</td>
                  <!-- <td>PatitosActividad</td>
                  <td>PatitosAlimentacion</td>
                  <td>PatitosHospedaje </td>
                  <td>PatitosTransporte </td>
                  <td>PatitosLugar</td>
                  <td>PatitosDisponibilidad</td> -->
                  <td>PatitosInicio</td>
                  <!-- <td>PatitosDuracion </td>
                  <td>PatitosMinimo</td> -->
                  <td>PatitosTelefono</td>
                  <td>PatitosPrecio</td>
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