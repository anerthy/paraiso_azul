<!-- Modal -->
<div class="modal fade" id="modalFormVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
              <input type="hidden" id="id_Voluntario" name="id_Voluntario" value="">
             


              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre_vol">Nombre</label>
                  <input type="text" class="form-control valid validText"  placeholder="Nombre del voluntario" id="txtNombre_vol" name="txtNombre_vol" required="">
                </div>
            
                <div class="form-group col-md-6">
                  <label for="txtApellido1">Primer apellido</label>
                  <input type="text" class="form-control valid validText" placeholder="Primer apellido completo" id="txtApellido1" name="txtApellido1" required="">
            </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtApellido2">Segundo apellido</label>
                  <input type="text" class="form-control valid validText" placeholder="Segundo apellido completo" id="txtApellido2" name="txtApellido2" required="" >
                </div>

                <div class="form-group col-md-6">
                  <label for="txtCedula">Cedula</label>
                  <input type="text" maxlength="9" class="form-control  valid  validNumber " placeholder="Cedula" id="txtCedula" name="txtCedula" required="">
                </div>
              </div>

              <div class="form-row">
                  <label for="txtCorreo">Correo</label>
                  <input type="email" class="form-control valid validCorreo" placeholder="Correo electronico" id="txtCorreo" name="txtCorreo" required="">
                </div>
                <div class="form-row">
                  <label for="txtTelefono">Telefono</label>
                  <input type="text" maxlength="8" class="form-control valid validNumber" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-row">
                  <label for="txtFecha_nacimiento">Fecha de nacimiento</label>
                  <input type="date" class="form-control valid validText" placeholder="Fecha de nacimiento" id="txtFecha_nacimiento" name="txtFecha_nacimiento" required="">
                </div>
                <div class="form-row">
                  <label for="txtGenero">Genero</label>
                  <input type="text" class="form-control valid validText" placeholder="Genero" id="txtGenero" name="txtGenero" required="" >
                </div>
                <div class="form-row">
                  <label for="txtLugar_residencia">Lugar de residencia</label>
                  <input type="text" class="form-control valid validText" placeholder="Lugar donde vive" id="txtLugar_residencia" name="txtLugar_residencia" required="" >
                </div>

              <div class="form-row">
              <div class="form-group">
                    <label for="listStatus">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
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
<div class="modal fade" id="modalViewVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId_voluntatario">654654654</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre_vol">Jacob</td>
            </tr>
            <tr>
              <td>Primer apellido:</td>
              <td id="celApellido1">Jacob</td>
            </tr>
            <tr>
              <td>Segundo apellido:</td>
              <td id="celApellido2">Larry</td>
            </tr>
            <tr>
              <td>Cedula:</td>
              <td id="celCedula">Larry</td>
            </tr>
            <tr>
              <td>Correo:</td>
              <td id="celCorreo">Larry</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Fecha de nacimiento:</td>
              <td id="celFecha_nacimiento">Larry</td>
            </tr>
            <tr>
              <td>Genero:</td>
              <td id="celGenero">Larry</td>
            </tr>
            <tr>
              <td>Residencia:</td>
              <td id="celLugar_residencia">Larry</td>
            </tr>
            
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
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



