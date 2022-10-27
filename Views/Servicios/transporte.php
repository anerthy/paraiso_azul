<?php
_header($data);
$arrTransportes =  $data['transportes'];
?>
<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="row">
    <?php
    // dep($arrTransporte);
    for ($i = 0; $i < count($arrTransportes); $i++) {

        $arrTransportes[$i]['imagen'];
    ?>
        <div id="cardtransporte" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrTransportes[$i]['imagen'] ?>" alt="logo del transporte" class="card-img-top" alt="logo del transporte" style="width: 300px; height:300px;">

            <div>
                <h4 class="nombre"><?= $arrTransportes[$i]['nombre_trans'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrTransportes[$i]['descripcion'] ?></p>
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