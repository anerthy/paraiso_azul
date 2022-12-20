<?php
headerAdmin($data);

?>
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
      <div class="profile">
        <div class="info">
          <img class="user-img" src="<?= media(); ?>/images/avatar (2).png">
          <h4><?= $_SESSION['userData']['nombre_usuario']; ?></h4>
          <p><?= $_SESSION['userData']['nombre_rol']; ?></p>
        </div>
        <div class="cover-image"></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos personales</a></li>
          </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="timeline-post">
            <div class="post-media">
              <div class="content">
                <h5>Informacion del usuario <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h5>
              </div>
            </div>

            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td><?= $_SESSION['userData']['id_usuario']; ?></td>
                </tr>
                <tr>
                  <td>Usuario:</td>
                  <td><?= $_SESSION['userData']['nombre_usuario']; ?></td>
                </tr>
                <tr>
                  <td>Correo:</td>
                  <td><?= $_SESSION['userData']['correo']; ?></td>
                </tr>
                <tr>
                  <td>Nombre del rol:</td>
                  <td><?= $_SESSION['userData']['nombre_rol']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
    </div>
  </div>
  </div>
</main>
<?php footerAdmin($data); ?>