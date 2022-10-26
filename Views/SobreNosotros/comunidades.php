<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<main>
    <section class="flex-container">

        <div class="caja c1">
            <!-- Caja 1 -->

            <center>
                <!-- <br> -->
                <h1 class="titulo"><?= $data['page_title'] ?></h1>
                <!-- <br> -->
            </center>

            <div>
                <?php
                // dep($arrTransporte);
                for ($i = 0; $i < count($arrComunidades); $i++) {
                ?>

                    <div class='card'>
                        <div class='info'>
                            <div class="logo">
                                <img src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad" class="card-img-top" alt="imagen del comunidad" style="width: 300px; height:300px;">
                            </div>
                            <div class="texto">
                                <h1 class='comunidad'><?= $arrComunidades[$i]['nombre_com'] ?></h1>
                                <h4 class="ubicacion"><?= $arrComunidades[$i]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i]['distrito'] ?>.</h4>
                                <p class='descripcion'><?= $arrComunidades[$i]['descripcion'] ?></p>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </section>
</main>



<?php
// dep($arrComunidades);
footer($data);
?>