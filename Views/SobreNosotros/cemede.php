<?php
_header($data);
$arrCEMEDE = $data['cemede'];
?>

<div>
   
    <!-- <h4>MISIÓN DEL CEMEDE </h4>
    <p id="info">Ser una instancia generadora de conocimiento para la puesta en práctica de alternativas <br> que promuevan el mejoramiento integral de la calidad de vida de los habitantes y del ambiente en Mesoamérica y el Caribe.</p>
  

    <h4>VISIÓN  DEL CEMEDE </h4>
    <p id="info">En el año 2020 el CEMEDE es una instancia con reconocimiento mesoamericano en la promoción del desarrollo sostenible <br> mediante el establecimiento de relaciones interinstitucionales, generación de espacios de investigación, extensión, docencia y producción <br>que contribuyan al conocimiento y formación especializada como respuesta a las problemática ambiental, económica, social, cultural y política mesoamericana.</p> -->

    

</div>

<div class="form-row">
<div ><img class="vis-CEMEDE" src="<?= media(); ?>/images/CEMEDE.png" alt="..." /></div>
    <?php
    
    for ($i = 0; $i < count($arrCEMEDE); $i++) {

       if($arrCEMEDE[$i]['cont_id_contenido'] = '5'){


       // $arrCEMEDE[$i]['imagen'];
    ?>
     
        <div id="cardcemede" class=" col-md-5 justify-content-center">
           
            <div>
                <br>
                <br>
                <h4 class="titulo"><?= $arrCEMEDE[$i]['cont_titulo'] ?></h4>
                <p id="contenido" class="card-text"><?= $arrCEMEDE[$i]['cont_contenido'] ?></p>
                
                <!-- <center><a href="#" class="btn btn-info">Ver más informacion</a></center> -->
            </div>
        </div>
    <?php
   }  }
    ?>
    <main>


<br>
<br>
<div>
    <iframe width="1099" height="315" src="https://www.youtube.com/embed/idkL3KsEng0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

</main>
</div>



<?php
footer($data);
?>