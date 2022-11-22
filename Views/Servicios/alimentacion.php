<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>
   <link href="<?= media(); ?>/css/cards-alimentacion/cards_alimentacion.css" rel="stylesheet">

<div>
    <h1>Alimentación</h1><br>
   
</div>

<div class="row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrAlimentacion); $i++) {
        $arrAlimentacion[$i]['imagen'];
    ?>
  <section class="programs">
		<a href="#">
			<div class="content">          
                <p id="nombre" class="textTitulo"><?= $arrAlimentacion[$i]['nombre_alim'] ?></p>
                <p id="descripcion" class="textDescrip"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                <p id="telefono" class="textTel">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
            <ul>
			
				</ul>	
			</div>
		</a>
        <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
	</section>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>