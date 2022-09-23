<!-- Modal -->
<div class="modal fade" id="modalFormTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Transporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formTransporte" name="formTransporte" class="form-horizontal">
              <input type="hidden" id="id_transporte" name="id_transporte" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">


              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre_trans">Nombre</label>
                  <input type="text" class="form-control valid validText" id="txtNombre_trans" name="txtNombre_trans" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtDescripcion">Descripcion</label>
                  <textarea type="text" class="form-control valid validText" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtClase">Clase</label>
                  <input type="text" class="form-control valid validText" id="txtClase" name="txtClase" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtTipo">Tipo</label>
                  <input type="text" class="form-control valid validText" id="txtTipo" name="txtTipo" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtDisponibilidad">Disponibilidad</label>
                  <input type="text" class="form-control valid validText" id="txtDisponibilidad" name="txtDisponibilidad" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtPrecio">Precio</label>
                  <input type="text" class="form-control valid validText" id="txtPrecio" name="txtPrecio" required="">
                </div>  
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                </div>
                
              <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div>
         
            


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
<div class="modal fade" id="modalViewTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del transporte</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId">654654654</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre_trans">Jacob</td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion">Jacob</td>
            </tr>
            <tr>
              <td>Clase:</td>
              <td id="celClase">Larry</td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td id="celTipo">Larry</td>
            </tr>
            <tr>
              <td>Disponibilidad:</td>
              <td id="celDisponibilidad">Larry</td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio">Larry</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            
            <tr>
              <td>Foto:</td>
              <td id="imgTransporte"></td>
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