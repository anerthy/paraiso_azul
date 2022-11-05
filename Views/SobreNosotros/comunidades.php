<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<main>
    <center>
        <br>
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <!-- <br> -->
    </center>

    <center>
        <?php
        // dep($arrTransporte);
        for ($i = 0; $i < count($arrComunidades); $i++) {
            if (($i % 2) == 0) {
        ?>

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
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                    <div class="carousel-item active">
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of carousel -->

                        <div class="col-md-7 px-3">
                            <div class="card-block px-6">
                                <h3 class="card-title"><b><?= $arrComunidades[$i]['nombre_com'] ?></b></h3>
                                <h4 class="card-title"><?= $arrComunidades[$i]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i]['distrito'] ?>.</h4>
                                <p class="card-text">
                                    <?= $arrComunidades[$i]['descripcion'] ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="card card-comunidades">
                    <div class="row ">
                        <div class="col-md-7 px-3">
                            <div class="card-block px-6">
                                <h3 class="card-title"><b><?= $arrComunidades[$i]['nombre_com'] ?></b></h3>
                                <h4 class="card-title"><?= $arrComunidades[$i]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i]['distrito'] ?>.</h4>
                                <p class="card-text">
                                    <?= $arrComunidades[$i]['descripcion'] ?>
                                </p>
                                <!-- <p class="card-text"><?= $arrComunidades[$i]['descripcion'] ?></p> -->
                            </div>
                        </div>
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
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                    <div class="carousel-item active">
                                        <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of carousel -->
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </center>
    </section>

</main>

<?php
// dep($arrComunidades);
footer($data);
?>