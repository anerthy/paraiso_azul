<?php
_header($data);
$arrHospedaje =  $data['hospedaje'];
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
         for ($i = 0; $i < count($arrHospedaje); $i++) {
            $arrHospedaje[$i]['imagen']; 
        ?>
            <div class="card-grupos">
            <center>
                <img id="imagen" src="<?= $arrHospedaje[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
                </center>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                    
                        </p>
                        <p>
                        <b>Información del hospedaje</b><br>
                        <br>
                        <b>Tipo de hospedaje:</b> <?= $arrHospedaje[$i]['tipo'] ?>
                        <br>
                        <b>Precio:</b> <?= $arrHospedaje[$i]['precio'] ?>
                        
                        </p>
                        <p>
                            <b>Información de contacto</b><br>
                            <b>Teléfono:</b> <?= $arrHospedaje[$i]['telefono'] ?>
                            <br>
                            <b>Dirección:</b> <?= $arrHospedaje[$i]['direccion'] ?>
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























