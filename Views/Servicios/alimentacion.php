<?php
_header($data);
$arrAlimentacion =  $data['alimentacion'];
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link href="<?= media(); ?>/css/cards-alimentacion/cards_alimentacion.css" rel="stylesheet">
   </head>
   <body>
   <!-- <div class="container">  -->
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
	

    <div class="main">
  <ul class="cards">
    <li class="cards_item">
      <div class="card">
        <div class="card_image">
        <img id="imagen" src="<?= $arrAlimentacion[$i]['imagen'] ?>" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">

        
        </div>
        <div class="card_content">
          <h2 class="card_title">
          <p id="" class="textTitulo"><?= $arrAlimentacion[$i]['nombre_alim'] ?></p>
        </h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $arrAlimentacion[$i]['id_alimentacion'] ?>">Abrir ventana de diálogo</button>

        </div>
      </div>
    </li>
  </ul>
</div>

</section>







    <div class="modal fade" id="<?= $arrAlimentacion[$i]['id_alimentacion'] ?>">
         <div class="modal-dialog">
          <div class="modal-content">
    
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Informacion</h4>
            <button type="button" class="close" data-dismiss="modal">X</button>
          </div>
    
          <!-- cuerpo del diálogo -->
          <div class="modal-body">
          <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nombre:</td>
                            <td><p id="" class="textTitulo"><?= $arrAlimentacion[$i]['nombre_alim'] ?></p></td>
                        </tr>
                        <tr>
                            <td>Descripcion:</td>
                            <td><p id="" class="textTitulo"><?= $arrAlimentacion[$i]['descripcion'] ?></p></td>
                        </tr>
                        <tr>
                            <td>Direccion:</td>
                            <td><p id="" class="textTitulo"><?= $arrAlimentacion[$i]['direccion'] ?></p></td>
                        </tr>
                        <tr>
                            <td>Horario:</td>
                            <td><p id="" class="textTitulo"><?= $arrAlimentacion[$i]['horario'] ?></p></td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td><p id="" class="textTitulo"><?= $arrAlimentacion[$i]['telefono'] ?></p></td>
                        </tr>
                   
                    </tbody>
                </table>
          </div>
    
          <!-- pie del diálogo -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
    
        </div>
      </div>
       </div> 




    <?php
    }
    ?>
</div>




<?php
footer($data);
?>





  
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>