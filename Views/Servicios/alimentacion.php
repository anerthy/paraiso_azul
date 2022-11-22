<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>
   <link href="<?= media(); ?>/css/cards-alimentacion/cards_alimentacion.css" rel="stylesheet">

   <br>
 <br>
 <br>
 <br>
 <center>
        <br>
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <br>
        <p id="info" style="font-size: 20px; text-align: justify; margin:20px">
        </p>

    </center>

<div class="row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrAlimentacion); $i++) {
        $arrAlimentacion[$i]['imagen'];
    ?>
  <section class="programs">
		<a href="#">
			<div class="content">          
                <p id="" class="textTitulo"><?= $arrAlimentacion[$i]['nombre_alim'] ?></p>
                <p id="" class="textDescrip"><?= $arrAlimentacion[$i]['descripcion'] ?></p>
                <p id="" class="textTel">Telefono: <?= $arrAlimentacion[$i]['telefono'] ?></p>
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