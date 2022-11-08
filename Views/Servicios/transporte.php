<?php
_header($data);
$arrTransportes =  $data['transportes'];
?>
<center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
</center>

<div class="container-grupos">
<?php
    // dep($arrTransporte);
    for ($i = 0; $i < count($arrTransportes); $i++) {

        $arrTransportes[$i]['imagen'];
    ?>
            <div class="card-grupos">
            <center>
                <img id="imagen" src="<?= $arrTransportes[$i]['imagen'] ?>" alt="logo del transporte" class="card-img-top" alt="logo del transporte" style="width: 300px; height:300px;">
                </center>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrTransportes[$i]['nombre_trans'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                        <p id="descripcion" class="card-text"><?= $arrTransportes[$i]['descripcion'] ?></p>
                        </p>
                        <p>
                           
                        </p>
                        <p>
                          
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