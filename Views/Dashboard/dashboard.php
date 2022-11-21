<?php
headerAdmin($data);
$arrModulos =  $data['modulos'];
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANZJREFUSEvtV8ENgzAQM5u0m8AmZbKyCd2EblJkRKsQaHxFJyWVchKv+DC+XJyjQaZoMvGiKOILAD6peESLKifGHyp+Gco/AOhX3B3ATeQ8AVxDTFzqFsBoIKaCbsURzzwVxH+UV+Ja6m8N81fNxePEY7WER1fTPNgbKdNhhTYm4kGszu/hejHELNdkkBBapuUISsskpzJ8YsL9crFMg9gdxI04m+Jfr0UXxZZGee9xvRZVY9ZBYFOhM87FQY8Dn4rk7XTGuSw5pvFWfbnLelF/Ei6K1EtmBBlUHyr3vLcAAAAASUVORK5CYII=" /> </i><?= $data['page_tag'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">

    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

        <div class="info">
          <h4><a href="<?= base_url(); ?>/usuarios">Usuarios</a></h4>
          <p><b> <?= $arrModulos[0]['Registros'] ?></b></p>
        </div>

      </div>

    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-gear fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/roles">Roles</a></h4>
          <p><b> <?= $arrModulos[1]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-building fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/grupos">Grupos</a></h4>
          <p><b> <?= $arrModulos[2]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-city fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/comunidades">Comunidades</a></h4>
          <p><b> <?= $arrModulos[3]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-utensils fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/alimentacion">Alimentaciones</a></h4>
          <p><b> <?= $arrModulos[4]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-home fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/hospedajes">Hospedajes</a></h4>
          <p><b> <?= $arrModulos[5]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-car fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/transportes">Transportes</a></h4>
          <p><b> <?= $arrModulos[6]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-walking fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/tours">Tours</a></h4>
          <p><b> <?= $arrModulos[7]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>

        <div class="info">
          <h4><a href="<?= base_url(); ?>/voluntarios">Voluntarios</a></h4>
          <p><b> <?= $arrModulos[8]['Registros'] ?></b></p>
        </div>

      </div>

    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-file fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/contenido">Contenidos</a></h4>
          <p><b> <?= $arrModulos[9]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-image fa-3x"></i>
        <div class="info">
          <h4><a href="<?= base_url(); ?>/galerias">Galeria</a></h4>
          <p><b> <?= $arrModulos[10]['Registros'] ?></b></p>
        </div>
      </div>
    </div>
  </div>

</main>
<?php footerAdmin($data); ?>