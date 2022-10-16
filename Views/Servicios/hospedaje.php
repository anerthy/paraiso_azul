<?php
_header($data);
$arrHospedaje =  $data['hospedaje'];
?>
<div>
    <h1>¿Que tipo de hospedaje ofrecemos?</h1><br>
    <p id="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>
</div>

<div class="form-row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrHospedaje); $i++) {
        $arrHospedaje[$i]['imagen'];
    ?>
        <div id="cardhospedajes" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrHospedaje[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrHospedaje[$i]['descripcion'] ?></p>
                <p id="precio" class="card-text">Precio: <?= $arrHospedaje[$i]['precio'] ?></p>
                <center><a href="#" class="btn btn-info">Ver más informacion</a></center>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>