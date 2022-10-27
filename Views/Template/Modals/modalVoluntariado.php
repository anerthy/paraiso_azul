
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
               
                <select class="form-control" id="txtGenero" name="txtGenero" required="">
                 <option value="1">Masculino</option>
                 <option value="2">Femenino</option>
               </select>

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
               <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
             </div>

        </form>

      </div>
    
      <br>
    </div>
  </div>
</div>