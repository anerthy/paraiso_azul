<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>
<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="container-grupos">
<?php
    // dep($arrTransporte);
    for ($i = 0; $i < count($arrAlimentacion); $i++) {

        $arrAlimentacion[$i]['imagen'];
    ?>
            <div class="card-grupos">
                <div>
                <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="logo del alimentacion" class="card-img-top" alt="logo del alimentacion" style="width: 300px; height:300px;">
                </div>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrAlimentacion[$i]['nombre_alim'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                        <p id="descripcion" class="card-text"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                        </p>
                        <p>
                           
                        </p>
                        <p>
                        <p id="telefono" class="card-text">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
                        </p>
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