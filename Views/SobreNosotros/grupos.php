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




    <center>
        <?php
        // dep($arrGrupos);
        for ($i = 0; $i < count($arrGrupos); $i++) {
        ?>
            <!-- <div id="cardgrupos" class="card col-md-3 justify-content-center">
                <img id="logo" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo" class="card-img-top" alt="logo del grupo" style="width: 300px; height:300px;">
                <div>
                    <h4 class="nombre"><?= $arrGrupos[$i]['nombre_grupo'] ?></h4>
                    <p id="descripcion" class="card-text"><?= $arrGrupos[$i]['descripcion'] ?></p>
                </div>
            </div> -->

            <div class="card card-comunidades">
                <div class="row ">
                    <!-- Carousel start -->
                    <div class="col-md-5">
                        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#CarouselTest" data-slide-to="0" class=""></li>
                                <li data-target="#CarouselTest" data-slide-to="1" class=""></li>
                                <li data-target="#CarouselTest" data-slide-to="2" class="active"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img class="d-block" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo">
                                </div>
                                <div class="carousel-item active">
                                    <img class="d-block" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of carousel -->

                    <div class="col-md-7 px-3">
                        <div class="card-block px-6">
                            <h3 class="card-title"><b><?= $arrGrupos[$i]['nombre_grupo'] ?></b></h3>
                            <h5 class="card-title"><?= $arrGrupos[$i]['descripcion'] ?></h5>
                            <br>
                            <h5 class="card-title">
                                <b>Representante:</b> <?= $arrGrupos[$i]['representante'] ?>
                            </h5>
                            <br>
                            <h5 class="card-text">
                                <b>Ubicacion:</b> <?= $arrGrupos[$i]['ubicacion'] ?>
                            </h5>
                            <br>
                            <h5>
                                <b>Informacion de contacto</b><br>
                                Correo: <?= $arrGrupos[$i]['correo'] ?><br>
                                Telefono: <?= $arrGrupos[$i]['telefono'] ?>
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

        <?php
        }
        ?>
    </center>

</main>

<?php
footer($data);
?>