<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<main>
    <center>
        <br>
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
  
    </center>

    <section>
        <center>
            <?php
       
            for ($i = 0; $i < count($arrComunidades); $i++) {
                if (($i % 2) == 0) {
            ?>

                    <div class="card card-comunidades">
                        <div class="row ">

                            <div class="col-md-5">
                                <div>
                                    <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                </div>
                            </div>

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
                            <div class="col-md-5">
                                <div>
                                    <img class="d-block" src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad">
                                </div>
                            </div>

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
footer($data);
?>