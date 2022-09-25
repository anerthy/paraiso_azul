<!-- Modal -->
<div class="modal fade" id="modalFormGrupo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formGrupo" name="formGrupo" class="form-horizontal">
              <input type="hidden" id="id_Grupo" name="id_Grupo" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">


              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre_grupo">Nombre</label>
                  <input type="text" class="form-control valid validText" id="txtNombre_grupo" name="txtNombre_grupo" required="">
                </div>
            
                <div class="form-group col-md-3">
                  <label for="txtNumero_integrantes">Integrantes</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Cantidad" id="txtNumero_integrantes" name="txtNumero_integrantes" required="" onkeypress="return controlTag(event);">
            </div>


              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtCorreo">Correo</label>
                  <input type="email" class="form-control valid validCorreo" id="txtCorreo" name="txtCorreo" required="">
                </div>
              </div>
              <div class="form-row">
           
                
              <div class="form-group">
                    <label for="listStatus">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div>
         
                <div class="form-group col-md-6">
                  <label for="txtDescripcion">Descripcion</label>
                  <textarea type="text" class="form-control valid validText" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
                </div>

              </div>
              <div class="form-group">
                  <label for="txtUbicacion">Ubicacion</label>
                  <textarea type="text" class="form-control valid validText" id="txtUbicacion" name="txtUbicacion" required=""></textarea>
                </div>
                <div class="form-group">
                  <label for="txtRepresentante">Representante</label>
                  <textarea type="text" class="form-control valid validText" id="txtRepresentante" name="txtRepresentante" required=""></textarea>
                </div>

                <div class="form-group">
                    <label for="listComunidad_id">Comunidad</label>
                    <select class="form-control" data-live-search="true" id="listComunidad_id" name="listComunidad_id" required="" >
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
<div class="modal fade" id="modalViewGrupo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del grupo</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId_grupo">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre_grupo">Jacob</td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion">Jacob</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Larry</td>
            </tr>
            <tr>
              <td>Correo (Grupo):</td>
              <td id="celCorreo">Larry</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Integrantes:</td>
              <td id="celNumero_integrantes">Larry</td>
            </tr>
            <tr>
              <td>Ubicacion:</td>
              <td id="celUbicacion">Larry</td>
            </tr>
            <tr>
              <td>Representante:</td>
              <td id="celRepresentante">Larry</td>
            </tr>
            <tr>
              <td>Comunidad:</td>
              <td id="celTipoGrupo">Larry</td>
            </tr>
            
            <tr>
              <td>Foto:</td>
              <td id="imgGrupo"></td>
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


