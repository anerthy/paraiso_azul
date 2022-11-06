


<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
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
   for ($i = 0; $i < count($arrAlimentacion); $i++) {
    $arrAlimentacion[$i]['imagen'];
        ?>
            <div class="card-grupos">
                <div>
                <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="Imagen de la alimentacion" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
                </div>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrAlimentacion[$i]['nombre_alim'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                 
                <p id="descripcion" class="card-text"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                <p id="telefono" class="card-text">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
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




































