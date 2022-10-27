<?php
_header($data);
$arrProyecto = $data['proyecto'];
?>
<main>


<div class="row">
   
    <?php

    for ($i = 0; $i < count($arrProyecto); $i++) {

        if ($arrProyecto[$i]['cont_id_contenido'] = '5') {
    ?>

            <div id="cardcemede" class=" col-md-3 justify-content-center">

                <div>
                    <br>
                    <br>
                    <h4 class="titulo-proyecto"><?= $arrProyecto[$i]['cont_titulo'] ?></h4>
                    <p id="contenido" class="card-text"><?= $arrProyecto[$i]['cont_contenido'] ?></p>

                    <!-- <center><a href="#" class="btn btn-info">Ver más informacion</a></center> -->
                </div>
            </div>
    <?php
        }
    }
    ?>
    
    </main>
</div>



<?php
footer($data);
?>