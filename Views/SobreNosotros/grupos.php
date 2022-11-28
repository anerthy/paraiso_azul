<?php
_header($data);
$arrGrupos =  $data['grupos'];
?>
   <link href="<?= media(); ?>/css/cards-grupos/card-grupos.css" rel="stylesheet">

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
    for ($i = 0; $i < count($arrGrupos); $i++) {
        $arrGrupos[$i]['logo'];
    ?>
  <section class="programs">
		<a href="#">
			<div class="content">          
                <p id="" class="textNom"><?= $arrGrupos[$i]['nombre_grupo'] ?></p>
                <!-- <p id="" class="textDescrip"><?= $arrGrupos[$i]['descripcion'] ?></p> -->
                <p id="" class="textRe">Representante: <?= $arrGrupos[$i]['representante'] ?></p>
                <p id="" class="textUbi">Ubicación: <?= $arrGrupos[$i]['ubicacion'] ?></p>
                <p id="" class="textCorreo">Correo: <?= $arrGrupos[$i]['correo'] ?></p>
                <p id="" class="textTel">Telefono: <?= $arrGrupos[$i]['telefono'] ?></p>
            <ul>
			
				</ul>	
			</div>
		</a>
        <img id="logo" src="<?= $arrGrupos[$i]['logo'] ?>" alt="logo del grupo" class="card-img-top" alt="logo del grupo" style="width: 300px; height:300px;">
	</section>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>