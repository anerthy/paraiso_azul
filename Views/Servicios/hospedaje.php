<?php
_header($data);
$arrHospedaje =  $data['hospedaje'];
?>
   <link href="<?= media(); ?>/css/cards-Hospedaje/cards_hospedaje.css" rel="stylesheet">

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
    for ($i = 0; $i < count($arrHospedaje); $i++) {
        $arrHospedaje[$i]['imagen'];
    ?>
  <section class="programs">
		<a href="#">
			<div class="content">          
                <p id="" class="textNombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></p>
                <p id="" class="textTipo">Tipo: <?= $arrHospedaje[$i]['tipo'] ?></p>
                <p id="" class="textPrecio">Precio: <?= $arrHospedaje[$i]['precio'] ?></p>
                <p id="" class="textTel">Telefono: <?= $arrHospedaje[$i]['telefono'] ?></p>
                <p id="" class="textDic">Dirección: <?= $arrHospedaje[$i]['direccion'] ?></p>
            <ul>
			
				</ul>	
			</div>
		</a>
        <img id="imagen" src="<?= $arrHospedaje[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
	</section>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>