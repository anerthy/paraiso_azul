<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="modal fade" id="modalFormComunidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR COMUNIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formComunidad" name="formComunidad" class="form-horizontal">
          <input type="hidden" id="id_Comunidad" name="id_Comunidad" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">


          <p class="text-primary">Todos los campos son obligatorios.</p>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre_com">Nombre</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese el nombre" id="txtNombre_com" name="txtNombre_com" required="">
            </div>
          </div>
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="txtDescripcion">Descripcion</label>
              <textarea type="text" class="form-control" placeholder="Ingrese la descripcion" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="txtProvincia">Provincia</label>
                <select class="form-control" id="txtProvincia" name="txtProvincia" required="">
                <option value="">Seleccione una provincia</option>
                  <option value="Puntarenas">Puntarenas</option>
                  <option value="Guanacaste">Guanacaste</option>
                </select>
              </div>
              
      
      

              <div class="form-group col-md-3">
                <label for="txtCanton">Canton</label>
                <select class="form-control" id="txtCanton" name="txtCanton" required="">
                <option value="">Seleccione una provincia</option>
                  <!-- <option value="Nicoya">Nicoya</option> 
                  <option value="Santa Cruz">Santa Cruz</option>
                  <option value="Bagases">Bagases</option>
                  <option value="Cañas">Cañas</option> -->
 

<!--PUNTARENAS-->

                    <!-- <option value="Esparza">Esparza</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="Monteverde">Monteverde</option>
                  <option value="Manzanillo">Manzanillo </option>
                  <option value="Lepanto">Lepanto</option>
               
                  
                   -->
              



                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="txtDistrito">Distrito</label>
                <select class="form-control" id="txtDistrito" name="txtDistrito" required="">
                <option value="">Seleccione una provincia</option>
                <!--PUNTARENAS-->
                  <!-- <option value="Chomes">Chomes</option> -->
                  <!-- <option value="Lepanto">Lepanto</option> -->
                  <!-- <option value="Manzanillo">Manzanillo</option> -->
                  <!-- <option value="San Antonio">San Antonio</option> NICOYA -->
                  <!-- <option value="Quebrada Honda">Quebrada Honda</option> NICOYA -->
                  <!-- <option value="Bebedero">Bebedero</option>CANNAS -->
                  <!-- <option value="Porozal">Porozal</option>CANNAS -->
                  <!-- <option value="Santa Cruz">Santa Cruz</option>santa cruz -->
                  <!-- <option value="Bagases">Bagases</option>BAGASES -->
                  <!-- <option value="Esparza">Esparza</option> -->
           
    
                </select>
              </div>

          </div>
         
          
<!-- <div>
  <b>Sección</b>
  <select name="txtProvincia" id="txtProvincia">
      <option value="">Seleccione una provincia</option>
      <option value="Puntarenas">Puntarenas</option>
      <option value="Guanacaste">Guanacaste</option>
  </select>
<div>
</div>
  <b>Canton</b>
  <select name="txtCanton" id="txtCanton">
      <option value="">Seleccione primero una provincia</option>
  </select>
</div>
<div>
  <b>Distrito</b>
  <select name="txtDistrito" id="txtDistrito">
      <option value="">Seleccione primero un canton</option>
  </select>
</div> -->



          <div class="form-row">
            <div class="form-row">

              <div class="col-md-6">
                <div class="photo">
                  <label for="foto">Foto (570x380)</label>
                  <div class="prevPhoto">
                    <span class="delPhoto notBlock">X</span>
                    <label for="foto"></label>
                    <div>
                      <img id="img" src="<?= media(); ?>/images/uploads/portada_categoria.png">
                    </div>
                  </div>
                  <div class="upimg">
                    <input type="file" name="foto" id="foto">
                  </div>
                  <div id="form_alert"></div>
                </div>
              </div>
            </div>

          </div>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


Modal
<div class="modal fade" id="modalViewComunidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la comunidad</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId">654654654</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre_com">Jacob</td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion">Jacob</td>
            </tr>
            <tr>
              <td>Provincia:</td>
              <td id="celProvincia">Larry</td>
            </tr>
            <tr>
              <td>Distrito:</td>
              <td id="celDistrito">Larry</td>
            </tr>
            <tr>
              <td>Canton:</td>
              <td id="celCanton">Larry</td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgComunidad"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>