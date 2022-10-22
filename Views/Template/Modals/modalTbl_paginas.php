<!-- Modal -->
<div class="modal fade" id="modalFormTbl_pagina" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR tabla de pagina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTbl_pagina" name="formTbl_pagina" class="form-horizontal">
          <input type="hidden" id="pag_id" name="pag_id" value="">
          

          <p class="text-primary">Todos los campos son obligatorios.</p>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="txtPag_Titulo">Titulo</label>
            <input type="text" class="form-control" placeholder="Ingrese el titulo" id="txtPag_Titulo" name="txtPag_Titulo" required="">
          </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="txtPag_Contenido">Contenido</label>
            <input type="text" class="form-control" placeholder="Ingrese el contenido" id="txtPag_Contenido" name="txtPag_Contenido" required="">
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
<div class="modal fade" id="modalViewTbl_pagina" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la pagina</h5>
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
              <td id="celPag_Titulo">Jacob</td>
            </tr>
            <tr>
              <td>Contenido:</td>
              <td id="celPag_Contenido">Larry</td>
            </tr>
            <tr>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>