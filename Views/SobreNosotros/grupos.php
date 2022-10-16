<?php
_header($data);
$arrGrupos =  $data['cardgrupos'];
?>

<h1>¿Que son los Grupos Organizados?</h1><br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>
<br>
<br>
<div class="container">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrGrupos); $i++) {
        $arrGrupos[$i]['logo'];
    ?>

        <div>
            <h4 class="mb-0"><?= $arrGrupos[$i]['nombre_grupo'] ?></h4 <p class="mb-4"><?= $arrGrupos[$i]['descripcion'] ?></p>
            <img class="img-fluid" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo" width="100">
        </div>
        <br>

    <?php
    }
    ?>
</div>

<?php
footer($data);
?>