<?php headerAdmin($data); ?>
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
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">Create a beautiful dashboard</div>
        <br>
        <!-- <?php dep($_SESSION['userData']); ?> -->
        <br>

        <?php
        // dep($_SESSION['permisosMod']);
        ?>

      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>