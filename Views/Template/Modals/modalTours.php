<!-- Modal -->
<div class="modal fade" id="modalFormTour" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formTour" name="formTour" class="form-horizontal">
              <input type="hidden" id="id_Tour" name="id_Tour" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">


              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre_tour">Nombre del tour</label>
                  <input type="text" class="form-control valid validText"  placeholder="Nombre del tour" id="txtNombre_tour" name="txtNombre_tour" required="">
                </div>
            
                <div class="form-group col-md-3">
                  <label for="txtDescripcion">Descripcion</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Cantidad" id="txtDescripcion" name="txtDescripcion" required="" onkeypress="return controlTag(event);">
            </div>


              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtServicio">Servicios</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Número de contacto" id="txtServicio" name="txtServicio" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtActividad">Actividad</label>
                  <input type="email" class="form-control valid validCorreo" placeholder="Correo electronico" id="txtActividad" name="txtActividad" required="">
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
                
                  <label for="txtAlimentacion">Alimentacion</label>
                  <input type="text" class="form-control valid validText" placeholder="Un representante" id="txtAlimentacion" name="txtAlimentacion" required="">
                </div>




              



              </div>

              <div class="form-group">
                  <label for="txtHospedaje">Hospedaje</label>
                  <textarea type="text" class="form-control valid validText" placeholder="Una pequeña descripcion de la organizacion" id="txtHospedaje" name="txtHospedaje" required=""></textarea>
                </div>

              <div class="form-group">
                  <label for="txtUbicacion">Ubicacion</label>
                  <textarea type="text" class="form-control valid validText" placeholder="Ubicacion para la organizacion" id="txtUbicacion" name="txtUbicacion" required=""></textarea>
                </div>

               




                <div class="form-group">
                    <label for="txtTransporte">Transporte</label>
                    <select class="form-control" data-live-search="true" id="txtTransporte" name="txtTransporte" required="" >
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="txtLugar">Lugar</label>
                    <select class="form-control" data-live-search="true" id="txtLugar" name="txtLugar" required="" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtDisponibilidad">Disponibilidad</label>
                    <select class="form-control" data-live-search="true" id="txtDisponibilidad" name="txtDisponibilidad" required="" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtHora_inicio">Hora inicio</label>
                    <select class="form-control" data-live-search="true" id="txtHora_inicio" name="txtHora_inicio" required="" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtDuracion">Duracion</label>
                    <select class="form-control" data-live-search="true" id="txtDuracion" name="txtDuracion" required="" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtCupo_minimo">Cupo minimo</label>
                    <select class="form-control" data-live-search="true" id="txtCupo_minimo" name="txtCupo_minimo" required="" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Telefono</label>
                    <select class="form-control" data-live-search="true" id="txtTelefono" name="txtTelefono" required="" >
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtPrecio">Precio</label>
                    <select class="form-control" data-live-search="true" id="txtPrecio" name="txtPrecio" required="" >
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

<!-- 
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

 -->
