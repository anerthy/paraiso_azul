<!-- Modal -->
<div class="modal fade" id="modalFormContenido" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR CONTENIDO DE PAGINA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formContenido" name="formContenido" class="form-horizontal">

          <input type="hidden" id="Cont_id_contenido" name="Cont_id_contenido" value="">

          <p class="text-primary">Todos los campos son obligatorios.</p>
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="txtTitulo">Titulo</label>
              <textarea type="text" class="form-control valid validText" placeholder="Ingrese el titulo" id="txtTitulo" name="txtTitulo" required=""></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtContenido">Contenido</label>
              <textarea type="text" class="form-control valid validText" placeholder="Ingrese el contenido de la pagina" id="txtContenido" name="txtContenido" required=""></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtModulo">Modulo</label>
              <select class="form-control" id="txtModulo" name="txtModulo" required="">
                <option value="Grupos Organizados">Grupos Organizados</option>
                <option value="Comunidades">Comunidades</option>
                <option value="Alimentacion">Alimentacion</option>
                <option value="Hospedaje">Hospedaje</option>
                <option value="Transporte">Transporte</option>
                <option value="Tours">Tours</option>
                <option value="CEMEDE">CEMEDE</option>
                <option value="Inicio">Inicio</option>
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
<div class="modal fade" id="modalViewContenido" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del contenido de pagina</h5>
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
              <td>Titulo:</td>
              <td id="celTitulo">Jacob</td>
            </tr>

            <tr>
              <td>Contenido:</td>
              <td id="celContenido">Jacob</td>
            </tr>

            <tr>
              <td>Modulo:</td>
              <td id="celModulo">Jacob</td>
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