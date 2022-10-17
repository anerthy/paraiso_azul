<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<h1>Comunidades</h1>

<div class="form-row">
    <?php
    // dep($arrTransporte);
    for ($i = 0; $i < count($arrComunidades); $i++) {
        $arrComunidades[$i]['imagen'];
    ?>
        <div id="cardtransporte" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad" class="card-img-top" alt="imagen del comunidad" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrComunidades[$i]['nombre_com'] ?></h4>
                <h4 class="nombre">Ubicacion: <?= $arrComunidades[$i]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i]['distrito'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrComunidades[$i]['descripcion'] ?></p>
                <center><a href="#" class="btn btn-info">Ver más informacion</a></center>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
// dep($arrComunidades);
footer($data);
?>