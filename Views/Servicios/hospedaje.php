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
            Turismo rural como estrategia para la reactivación económica y promoción del desarrollo local sostenible en comunidades del Golfo de Nicoya, tiene como fin el fortalecimiento de la gestión del turismo a través de la vinculación de las organizaciones locales , como actores protagónicos, en este proyecto participan las siguientes organizaciones.
        </p>

    </center>

    <div class="container-grupos">
        <?php
         for ($i = 0; $i < count($arrHospedaje); $i++) {
            $arrHospedaje[$i]['imagen']; 
        ?>
            <div class="card-grupos">
                <div>
                <img id="imagen" src="<?= $arrHospedaje[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
                </div>

                <div>
                    <span>
                    <h4 class="nombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></h4>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                    
                        </p>
                        <p>
                            <b>Dirección:</b> <?= $arrHospedaje[$i]['direccion'] ?>
                        </p>
                        <p>
                            <b>Informacion de contacto</b><br>
                            Telefono: <?= $arrHospedaje[$i]['telefono'] ?>
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























