<?php 
    headerAdmin($data); 
    getModal('modalTransportes',$data);
?>
<div id="contentAjax"></div> 
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/transportes"><?= $data['page_title'] ?></a></li>
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
                          <th>Status</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Integrantes</th>
                          <th>Ubicacion</th>
                          <th>Ubicacion</th>
                          <th>Acciones</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Patitos</td>
                          <td>PatitosDescripcion</td>
                          <td>Activo</td>
                          <td>patitos@info.com</td>
                          <td>78542155</td>
                          <td>20</td>
                          <td>Al lado del bnc</td>
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