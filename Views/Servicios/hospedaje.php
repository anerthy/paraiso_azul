<?php
_header($data);
$arrHospedaje =  $data['hospedaje'];
?>
<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrHospedaje); $i++) {
        $arrHospedaje[$i]['imagen'];
    ?>
        <div id="cardhospedajes" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrHospedaje[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrHospedaje[$i]['descripcion'] ?></p>
                <p id="precio" class="card-text">Precio: <?= $arrHospedaje[$i]['precio'] ?></p>
                <!-- <center><a href="#" class="btn btn-info">Ver más informacion</a></center> -->
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>