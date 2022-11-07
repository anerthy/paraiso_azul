<?php
_header($data);
$arrTours =  $data['tours'];
?>

<main>

    <center>
        <br>
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <br>
        <p id="info" style="font-size: 20px; text-align: justify; margin:20px">
        </p>

    </center>

    
    <div class="container-grupos">
        <?php
        for ($i = 0; $i < count($arrTours); $i++) {
            $arrTours[$i]['imagen'];
        ?>
            <div class="card-grupos">
                <div>
                <img id="logo" src="<?= $arrTours[$i]['imagen'] ?>" alt="logo del grupo" class="card-img-top" alt="imagen del tour" style="width: 300px; height:300px;">
                </div>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrTours[$i]['nombre_tour'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                    <p>
                    <b>Actividad:</b> <?= $arrTours[$i]['actividad'] ?><br>
                    <b>Alimentacion:</b> <?= $arrTours[$i]['alimentacion'] ?><br>
                    <b>Hospedaje:</b> <?= $arrTours[$i]['hospedaje'] ?><br>
                    <b>Transporte:</b> <?= $arrTours[$i]['transporte'] ?><br>
                </p>
                <h6>
                    Precio: <?= $arrTours[$i]['precio'] ?>
                </h6>
                    </span>

                    <center>
                        <button class="readMore_btn" id="readMore_btn" onclick="toggleText()">Ver más</button>
                    </center>

                </div>

            </div>

        <?php
        }
        ?>
    </div>
</main>

<?php
footer($data);
?>
date_create_immutable_from_format