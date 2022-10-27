<?php
_header($data);
$arrTours =  $data['tours'];
?>

<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="row">
    <?php
    // dep($arrTours);
    for ($i = 0; $i < count($arrTours); $i++) {
        $arrTours[$i]['imagen'];
    ?>
        <div id="cardgrupos" class="card col-md-3 justify-content-center">
            <img id="logo" src="<?= $arrTours[$i]['imagen'] ?>" alt="logo del grupo" class="card-img-top" alt="imagen del tour" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrTours[$i]['nombre_tour'] ?></h4>
                <p>
                    <b>Actividad:</b> <?= $arrTours[$i]['actividad'] ?><br>
                    <b>Alimentacion:</b> <?= $arrTours[$i]['alimentacion'] ?><br>
                    <b>Hospedaje:</b> <?= $arrTours[$i]['hospedaje'] ?><br>
                    <b>Transporte:</b> <?= $arrTours[$i]['transporte'] ?><br>
                </p>
                <h6>
                    Precio: <?= $arrTours[$i]['precio'] ?>
                </h6>
                <!-- <p id="descripcion" class="card-text"><?= $arrTours[$i]['descripcion'] ?></p> -->
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