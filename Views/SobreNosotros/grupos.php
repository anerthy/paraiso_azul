<?php
_header($data);
$arrGrupos =  $data['cardgrupos'];
?>
<div>
    <h1>¿Que son los Grupos Organizados?</h1><br>
    <p id="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>
</div>

<div class="form-row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrGrupos); $i++) {
        $arrGrupos[$i]['logo'];
    ?>
        <div id="cardgrupos" class="card col-md-3 justify-content-center">
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

<?php
footer($data);
?>