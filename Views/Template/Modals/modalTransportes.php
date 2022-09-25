
<!-- Modal -->
<div class="modal fade" id="modalFormTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo transporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formTransporte" name="formTransporte">
              <input type="hidden" id="id_Transporte" name="id_Transporte" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">
              <div class="form-group">
                <label class="control-label">Nombre</label>
                <input class="form-control" id="txtNombre_trans" name="txtNombre_trans" type="text" placeholder="Nombre" required="">
              </div>
              <div class="form-group">
                <label class="control-label">Descripción</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del transporte" required=""></textarea>
              </div>



              

              
              <div class="form-group">
                <label for="exampleSelect1">Clase</label>
                <select class="form-control" id="txtClase" name="txtClase" required="">
                  <option value="1">Publico</option>
                  <option value="2">Privado</option>
                </select>
              </div>







              

              <div class="form-group">
                <label for="exampleSelect1">Tipo</label>
                <select class="form-control" id="txtTipo" name="txtTipo" required="">
                  <option value="1">Terrestre</option>
                  <option value="2">Maritimo</option>
                </select>
              </div>






              <div class="form-group">
                <label class="control-label">Disponibilidad</label>
                <textarea class="form-control" id="txtDisponibilidad" name="txtDisponibilidad" rows="2" placeholder="Disponibilidad" required=""></textarea>
              </div>

              <div class="form-group">
                <label class="control-label">Precio</label>
                <input class="form-control" id="txtPrecio" name="txtPrecio" rows="2" placeholder="Precio" required="">
              </div>
              <div class="form-group">
                <label class="control-label">Telefono</label>
                <input class="form-control" id="txtTelefono" name="txtTelefono" rows="2" placeholder="Telefono del transporte" required="">
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
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de transporte</h5>
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
              <td>Nombres:</td>
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
              <td>Direccion:</td>
              <td id="celDisponibilidad">Larry</td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio">Larry</td>
            </tr>
            <td>Telefono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
            <tr>
              <td>Estado:</td>
              <td id="celStatus">Larry</td>
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