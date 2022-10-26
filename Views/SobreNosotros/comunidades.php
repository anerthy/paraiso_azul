<?php
_header($data);
$arrComunidades = $data['comunidades'];
?>

<main>

    <style>
        .card {
            width: 100;
            margin: 30px;
            /* align-items: center; */
            align-self: center;
            text-align: justify;
        }

        .info {
            position: relative;
            width: 100%;
            height: 500px;
            background-color: #fff;
        }
    </style>

    <center>
        <br>
        <h1>Comunidades</h1>
        <br>
    </center>

    <div>
        <?php
        // dep($arrTransporte);
        for ($i = 0; $i < count($arrComunidades); $i++) {
        ?>

            <div class='card'>
                <div class='info'>
                    <div>
                        <img src="<?= $arrComunidades[$i]['imagen'] ?>" alt="imagen de la comunidad" class="card-img-top" alt="imagen del comunidad" style="width: 300px; height:300px;">
                    </div>
                    <div>
                        <h1 class='comunidad'><?= $arrComunidades[$i]['nombre_com'] ?></h1>
                        <h2 class="ubicacion"><?= $arrComunidades[$i]['provincia'] ?>, <?= $arrComunidades[$i]['canton'] ?>, <?= $arrComunidades[$i]['distrito'] ?>.</h2>
                        <p class='descripcion'><?= $arrComunidades[$i]['descripcion'] ?></p>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>

    <!-- <div class='card'>
            <div class='info'>
                <img src="..." alt="imagen de la comunidad" class="card-img-top" alt="imagen del comunidad" style="width: 300px; height:300px;">
                <h1 class='comunidad'>Nombre</h1>
                <h2 class="ubicacion">Puntarenas, Lepanto, Lepanto.</h2>
                <p class='descripcion'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius esse corporis, velit porro impedit laudantium accusamus! Id velit, illum magni rem mollitia blanditiis iste maiores optio ipsa, est dolorem fugit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius esse corporis, velit porro impedit laudantium accusamus! Id velit, illum magni rem mollitia blanditiis iste maiores optio ipsa, est dolorem fugit.</p>
            </div>
     </div> -->

    <div class="flex-container">

    </div>

</main>

<?php
// dep($arrComunidades);
footer($data);
?>