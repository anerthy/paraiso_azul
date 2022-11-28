
<!-- Modal -->
<div class="modal fade" id="modalFormVoluntariado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo voluntario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
                        <input type="hidden" id="id_Voluntario" name="id_Voluntario" value="">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtNombre_vol" name="txtNombre_vol" placeholder="Your Name">
                                        <label for="txtNombre_vol">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtApellido1" name="txtApellido1" placeholder="Your Email">
                                        <label for="txtApellido1">Primer Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtApellido2" name="txtApellido2" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtApellido2">Segundo Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtCedula" name="txtCedula" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtCedula">Cedula</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="email" class="form-control datetimepicker-input" id="txtCorreo" name="txtCorreo" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtCorreo">Correo electronico</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtTelefono" name="txtTelefono" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtTelefono">Telefono</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="txtFecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control valid validText" placeholder="Fecha de nacimiento" id="txtFecha_nacimiento" name="txtFecha_nacimiento" required="">
                                </div>

                                <div class="col-md-6">
                                 <label for="txtGenero">Genero</label>            
                                   <select class="form-control" id="txtGenero" name="txtGenero" required="">
                                      <option value="1">Masculino</option>
                                      <option value="2">Femenino</option>
                                    </select>
                                     </div>                            
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="txtLugar_residencia" name="txtLugar_residencia" style="height: 100px"></textarea>
                                        <label for="txtLugar_residencia">Lugar donde residencia</label>
                                    </div>
                                </div>
                                <div class="form-group">
                   <label for="listStatus">Estado</label>
                   <select class="form-control" id="listStatus" name="listStatus" required="">
                     <option value="1">Activo</option>
                     <option value="2">Inactivo</option>
                   </select>
               </div>      



                                <div class="col-12">
                                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>