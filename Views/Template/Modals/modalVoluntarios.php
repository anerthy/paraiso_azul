<!-- Modal -->
<div class="modal fade" id="modalFormVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
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
              <input type="hidden" id="id_Voluntario" name="id_Voluntario" value="">
             


              <p class="text-primary">Todos los campos son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre_vol">Nombre</label>
                  <input type="text" class="form-control valid validText"  placeholder="Nombre del grupo" id="txtNombre_vol" name="txtNombre_vol" required="">
                </div>
            
                <div class="form-group col-md-3">
                  <label for="txtApellido1">Primer apellido</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Cantidad" id="txtApellido1" name="txtApellido1" required="" onkeypress="return controlTag(event);">
            </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtApellido2">Segundo apellido</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Número de contacto" id="txtApellido2" name="txtApellido2" required="" onkeypress="return controlTag(event);">
                </div>

                <div class="form-group col-md-6">
                  <label for="txtCedula">Cedula</label>
                  <input type="text" class="form-control valid validCorreo" placeholder="Correo electronico" id="txtCedula" name="txtCedula" required="">
                </div>
              </div>

              <div class="form-row">
                  <label for="txtCorreo">Correo</label>
                  <input type="email" class="form-control valid validNumber" placeholder="Número de contacto" id="txtCorreo" name="txtCorreo" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-row">
                  <label for="txtTelefono">Telefono</label>
                  <input type="email" class="form-control valid validNumber" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-row">
                  <label for="txtFecha_nacimiento">Fecha de nacimiento</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Número de contacto" id="txtFecha_nacimiento" name="txtFecha_nacimiento" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-row">
                  <label for="txtGenero">Fecha de nacimiento</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Número de contacto" id="txtGenero" name="txtGenero" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-row">
                  <label for="txtLugar_residencia">Lugar de residencia</label>
                  <input type="text" class="form-control valid validNumber" placeholder="Número de contacto" id="txtLugar_residencia" name="txtLugar_residencia" required="" onkeypress="return controlTag(event);">
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

