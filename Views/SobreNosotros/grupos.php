<?php
_header($data);
$arrGrupos =  $data['grupos'];
?>

<main>

    <div>
        <center>
            <br>
            <h1><?= $data['page_title'] ?></h1>
            <br>
        </center>

        <p id="info" style="font-size: 20px;">Turismo rural como estrategia para la reactivación económica y promoción del desarrollo local sostenible en comunidades del Golfo de Nicoya, tiene como fin el fortalecimiento de la gestión del turismo a través de la vinculación de las organizaciones locales , como actores protagónicos, en este proyecto participan las siguientes organizaciones.</p>
    </div>

    <div class="form-row">
        <?php
        // dep($arrGrupos);
        for ($i = 0; $i < count($arrGrupos); $i++) {
            // $arrGrupos[$i]['logo'];
        ?>
            <div id="cardgrupos" class="col-md-3 col-sm-3 col-xs-12 justify-content-center">
                <img id="logo" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo" class="card-img-top" alt="logo del grupo" style="width: 300px; height:300px;">
                <div>
                    <h4 class="nombre"><?= $arrGrupos[$i]['nombre_grupo'] ?></h4>
                    <p id="descripcion" class="card-text"><?= $arrGrupos[$i]['descripcion'] ?></p>
                    <center><a href="#" class="btn btn-info">Ver más informacion</a></center>
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