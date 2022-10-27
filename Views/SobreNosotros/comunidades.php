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
        for ($i = 0; $i < count($arrComunidades); $i += 2) {
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
                            <h3 class="card-title"><b><?= $arrComunidades[$i + 1]['nombre_com'] ?></b></h3>
                            <h4 class="card-title"><?= $arrComunidades[$i + 1]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i + 1]['distrito'] ?>.</h4>
                            <p class="card-text">
                                <?= $arrComunidades[$i + 1]['descripcion'] ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card card-comunidades">
                <div class="row ">
                    <div class="col-md-7 px-3">
                        <div class="card-block px-6">
                            <h3 class="card-title"><b><?= $arrComunidades[$i + 1]['nombre_com'] ?></b></h3>
                            <h4 class="card-title"><?= $arrComunidades[$i + 1]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i + 1]['distrito'] ?>.</h4>
                            <p class="card-text">
                                <?= $arrComunidades[$i + 1]['descripcion'] ?>
                            </p>
                            <!-- <p class="card-text"><?= $arrComunidades[$i + 1]['descripcion'] ?></p> -->
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
                                    <img class="d-block" src="<?= $arrComunidades[$i + 1]['imagen'] ?>" alt="imagen de la comunidad">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block" src="<?= $arrComunidades[$i + 1]['imagen'] ?>" alt="imagen de la comunidad">
                                </div>
                                <div class="carousel-item active">
                                    <img class="d-block" src="<?= $arrComunidades[$i + 1]['imagen'] ?>" alt="imagen de la comunidad">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of carousel -->
                </div>
            </div>
        <?php
        }
        ?>
    </center>
    </section>

</main>

<?php
// dep($arrComunidades);
footer($data);
?>