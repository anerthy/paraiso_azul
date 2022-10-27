<?php
_header($data);
$arrHospedaje =  $data['hospedaje'];
?>
<div>
    <h1>Hospedaje</h1><br>
</div>

<div class="row">
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrHospedaje); $i++) {
        $arrHospedaje[$i]['imagen'];
    ?>
       
        
	  <section class="programs">
		<a href="#">
			<div class="content">
            <h4 class="nombre"><?= $arrHospedaje[$i]['nombre_hosp'] ?></h4>
                <p id="descripcion" class="card-text"><?= $arrHospedaje[$i]['descripcion'] ?></p>
                <p id="precio" class="card-text">Precio: <?= $arrHospedaje[$i]['precio'] ?></p>
                <p id="tipo" class="card-text" >Tipo: <?= $arrHospedaje[$i]['tipo'] ?></p>
                <p id="telefono" class="card-text">Telefono: <?= $arrHospedaje[$i]['telefono'] ?></p>
                <p id="direccion" class="card-text">Direccion: <?= $arrHospedaje[$i]['direccion'] ?></p>
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