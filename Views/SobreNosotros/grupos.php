<?php
_header($data);
$arrGrupos =  $data['cardgrupos'];
?>

<h1>¿Que son los Grupos Organizados?</h1><br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>

<?php
// dep($arrGrupos);
for ($i = 0; $i < count($arrGrupos); $i++) {
    $arrGrupos[$i]['logo'];
?>

    <div style="margin: 10%;">
        <img src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo" width="100">
        <h2><?= $arrGrupos[$i]['nombre_grupo'] ?></h2>
        <h3>Representante: <?= $arrGrupos[$i]['representante'] ?></h3>
        <h3>¿Que es <?= $arrGrupos[$i]['nombre_grupo'] ?>?</h3>
        <p><?= $arrGrupos[$i]['descripcion'] ?></p>
        <div>
            <h3>Ubicacion</h3>
            <h3><?= $arrGrupos[$i]['nombre_com'] ?></h3>
            <p><?= $arrGrupos[$i]['ubicacion'] ?></p>
        </div>

        <div>
            <h3>Contacto:</h3>
            <h3><?= $arrGrupos[$i]['correo'] ?></h3>
            <h3><?= $arrGrupos[$i]['telefono'] ?></h3>
        </div>
        <h3>Cantidad de integrantes: <?= $arrGrupos[$i]['numero_integrantes'] ?></h3>
    </div>

<?php
}
?>

<?php
footer($data);
?>