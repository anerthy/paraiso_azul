<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<h1>Comunidades</h1>

<div class="form-row">
    <?php
    // dep($arrTransporte);
    for ($i = 0; $i < count($arrTransporte); $i++) {
        $arrTransporte[$i]['Imagen'];
    ?>
        <div id="cardtransporte" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrTransporte[$i]['imagen'] ?>" alt="imagen de la comunidad" class="card-img-top" alt="imagen del comunidad" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrTransporte[$i]['nombre_transporte'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrTransporte[$i]['descripcion'] ?></p>
                <center><a href="#" class="btn btn-info">Ver más informacion</a></center>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
dep($arrComunidades);
footer($data);
?>