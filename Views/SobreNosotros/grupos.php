<?php
_header($data);
$arrGrupos =  $data['grupos'];
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
        for ($i = 0; $i < count($arrGrupos); $i++) {
        ?>
            <div class="card-grupos">
                <div>
                    <img class="logo" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo">
                </div>


                <div>
                    <span>
                        <p><b><?= $arrGrupos[$i]['nombre_grupo'] ?></b></p>
                        <p><?= $arrGrupos[$i]['descripcion'] ?></p>
                    </span>
                    <span id="hideText" class="hideText">
                        <p>
                            <b>Representante:</b> <?= $arrGrupos[$i]['representante'] ?>
                        </p>
                        <p>
                            <b>Ubicacion:</b> <?= $arrGrupos[$i]['ubicacion'] ?>
                        </p>
                        <p>
                            <b>Informacion de contacto</b><br>
                            Correo: <?= $arrGrupos[$i]['correo'] ?><br>
                            Telefono: <?= $arrGrupos[$i]['telefono'] ?>
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
    </div>

</main>

<?php
footer($data);
?>