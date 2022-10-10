<?php
headerAdmin($data);
getModal('modalComunidades', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-city"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['agregar']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/comunidades"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableComunidades">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Provincia</th>
                  <th>Canton</th>
                  <th>Distrito</th>
                  <!-- <th></th> -->
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Patitos</td>
                  <td>PatitosDescripcion</td>
                  <td>Al lado del bnc</td>
                  <td>Al lado del bnc</td>
                  <td>Al lado del bnc</td>
                  <!-- <td></td> -->
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