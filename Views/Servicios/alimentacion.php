<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>
<div>
    <h1>Ofrecemos múltiples opciones de alimentación alredor de nuestro Golfo</h1><br>
    <p id="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>
</div>

<div class="form-row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrAlimentacion); $i++) {
        $arrAlimentacion[$i]['imagen'];
    ?>
        <div id="cardalimentacion" class="card col-md-3 justify-content-center">
            <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
            <div>
                <h4 class="nombre"><?= $arrAlimentacion[$i]['nombre_alim'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                <p id="telefono" class="card-text">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
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