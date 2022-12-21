<?php
_header($data);
$arrTransporte =  $data['transportes'];
?>
   <link href="<?= media(); ?>/css/cards-transporte/cards_transporte.css" rel="stylesheet">

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
    for ($i = 0; $i < count($arrTransporte); $i++) {
        $arrTransporte[$i]['imagen'];
    ?>
  <section class="programs">
		<a href="#">
			<div class="content">          
                <p id="" class="textTitulo"><?= $arrTransporte[$i]['nombre_trans'] ?></p>
                <p id="" class="textDescrip"><?= $arrTransporte[$i]['descripcion'] ?></p>
                <p id="" class="textTel">Telefono: <?= $arrTransporte[$i]['telefono'] ?></p>
            <ul>
			
				</ul>	
			</div>
		</a>
        <img id="imagen" src="<?= $arrTransporte[$i]['imagen'] ?>" alt="Imagen del transporte" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
	</section>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>