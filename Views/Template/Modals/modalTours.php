<!-- Modal -->
<!-- 
 <div class="modal fade" id="modalFormTour" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">  -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="modalFormTour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
              <input type="text" class="form-control valid validText" placeholder="Nombre del tour" id="txtNombre_tour" name="txtNombre_tour" required="" autofocus="on">
            </div>
            <div class="form-group col-md-6">
              <label for="txtLugar">Lugar</label>
              <input class="form-control" data-live-search="true" id="txtLugar" placeholder="Lugar donde se realiza el tour" name="txtLugar" required=""></input>
            </div>
          </div>

          <div class="form-row">
            <label for="txtDescripcion">Descripcion</label>
            <textarea class="form-control" data-live-search="true" id="txtDescripcion" placeholder="Descripcion del tour" name="txtDescripcion" required=""></textarea>
          </div>

          <script type="text/javascript">
            function MostrarAlimentacion(v) {
              if (v.id == "alim") {
                $("#formAlim").show();
              } else {
                $("#formAlim").hide();
              }
            }

            function MostrarHospedaje(v) {
              if (v.id == "hosp") {
                $("#formHosp").show();
              } else {
                $("#formHosp").hide();
              }
            }

            function MostrarTransporte(v) {
              if (v.id == "trans") {
                $("#formTrans").show();
              } else {
                $("#formTrans").hide();
              }
            }
          </script>

          <div class="form-row">
            <label for="txtDisponibilidad">Disponibilidad</label>
            <input class="form-control" type="text" data-live-search="true" id="txtDisponibilidad" placeholder="Disponibilidad del tour" name="txtDisponibilidad" required=""></input>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="servicios">Servicios</label>
              <select name="servicios" id="servicios" class="form-control" multiple size="3">
                <option value="Alimentacion" id="alim" onclick="MostrarAlimentacion(this);">Servicio de alimentacion</option>
                <option value="Hospedaje" id="hosp" onclick="MostrarHospedaje(this);">Servicio de hospedaje</option>
                <option value="Transporte" id="trans" onclick="MostrarTransporte(this);">Servicio de transporte</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="txtActividad">Actividad</label>
              <textarea type="text" class="form-control valid validText" placeholder="Actividad" id="txtActividad" name="txtActividad" required=""></textarea>
            </div>
          </div>

          <div class="form-group" id="formAlim" style="display: none;">
            <label for="txtAlimentacion">Alimentacion</label>
            <textarea type="text" class="form-control valid validText" placeholder="Servicio de alimentacion" id="txtAlimentacion" name="txtAlimentacion"></textarea>
          </div>

          <div class="form-group" id="formHosp" style="display: none;">
            <label for="txtHospedaje">Hospedaje</label>
            <textarea type="text" class="form-control valid validText" placeholder="Servicio de hospedaje" id="txtHospedaje" name="txtHospedaje"></textarea>
          </div>

          <div class="form-group" id="formTrans" style="display: none;">
            <label for="txtTransporte">Transporte</label>
            <textarea class="form-control" data-live-search="true" placeholder="Servicio de trasporte" id="txtTransporte" name="txtTransporte"></textarea>
          </div>

          <div class="form-row">

            <div class="form-group col-md-4">
              <label for="txtTelefono">Telefono</label>
              <input type="text" class="form-control" data-live-search="true" placeholder="Numero de contacto" id="txtTelefono" name="txtTelefono" required="">
            </div>

            <div class="form-group col-md-4">
              <label for="txtPrecio">Precio</label>
              <input type="text" class="form-control" data-live-search="true" placeholder="Cantidad en colones" id="txtPrecio" name="txtPrecio" required="">
            </div>

            <div class="form-group col-md-3">
              <label for="txtCupo_minimo">Cupo minimo</label>
              <input type="number" min="0" class="form-control" data-live-search="true" id="txtCupo_minimo" placeholder="Cupo minimo de personas" name="txtCupo_minimo" required="">
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="txtHora_inicio">Hora inicio</label>
                <input type="time" class="form-control" data-live-search="true" id="txtHora_inicio" name="txtHora_inicio" required="">
              </div>
              <div class="form-group col-md-4">
                <label for="txtDuracion">Duracion</label>
                <input type="time" class="form-control" data-live-search="true" id="txtDuracion" name="txtDuracion" required="">
              </div>
              <div class="form-group" col-md-3>
                <div class="form-group">
                  <label for="listStatus">Estado</label>
                  <select class="form-control" id="listStatus" name="listStatus" required="">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
              </div>
            </div>
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


<!-- Modal -->
<!-- <div class="modal fade" id="modalViewTour" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  "> -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="modalViewTour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del tour</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId_tour">654654654</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre_tour">Jacob</td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion">Jacob</td>
            </tr>
            <tr>
              <td>Servicio:</td>
              <td id="celServicio">Larry</td>
            </tr>
            <tr>
              <td>Actividad:</td>
              <td id="celActividad">Larry</td>
            </tr>
            <tr>
              <td>Alimentacion:</td>
              <td id="celAlimentacion">Larry</td>
            </tr>
            <tr>
              <td>Hospedaje:</td>
              <td id="celHospedaje">Larry</td>
            </tr>
            <tr>
              <td>Transporte:</td>
              <td id="celTransporte">Larry</td>
            </tr>
            <tr>
              <td>Lugar:</td>
              <td id="celLugar">Larry</td>
            </tr>
            <tr>
              <td>Disponibilidad:</td>
              <td id="celDisponibilidad">Larry</td>
            </tr>
            <tr>
              <td>Hora de inicio:</td>
              <td id="celHora_inicio">Larry</td>
            </tr>
            <tr>
              <td>Duracion:</td>
              <td id="celDuracion">Larry</td>
            </tr>
            <tr>
              <td>Cupo minimo:</td>
              <td id="celCupo_minimo">Larry</td>
            </tr>
            <tr>
              <td>Cupo Telefono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio">Larry</td>
            </tr>

            <tr>
              <td>Estado:</td>
              <td id="celEstado">Larry</td>
            </tr>

          </tbody>
        </table>
        <div id="imgTour"> </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>