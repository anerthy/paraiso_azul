<!-- Modal -->
<div class="modal fade" id="modalFormComunidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo COMUNIDAD</h5>
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
                  <label for="txtNombre">Nombre</label>
                  <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                </div>
            
           


              </div>
             
              <div class="form-row">
           
                
              <!-- <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" >
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div> -->
         
                <div class="form-group col-md-6">
                  <label for="txtDescripcion">Descripcion</label>
                  <textarea type="text" class="form-control valid validText" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
                </div>

              </div>
              <div class="form-group">
                  <label for="txtUbicacion">Ubicacion</label>
                  <textarea type="text" class="form-control valid validText" id="txtUbicacion" name="txtUbicacion" required=""></textarea>
                </div>


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
