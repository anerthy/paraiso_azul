<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>
<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrAlimentacion); $i++) {
        $arrAlimentacion[$i]['imagen'];
    ?>
        <div id="cardalimentacion" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrAlimentacion[$i]['nombre_alim'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                <p id="telefono" class="card-text">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
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