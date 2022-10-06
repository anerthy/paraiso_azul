
var tableTbl_paginas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableTbl_paginas = $('#tableTbl_paginas').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Tbl_paginas/getTbl_paginas",
            "dataSrc":""
        },
        "columns":[
            {"data":"pag_id"},
            {"data":"pag_titulo"},
            {"data":"pag_contenido"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });





    
	






    //NUEVO ROL
    var formTbl_pagina = document.querySelector("#formTbl_pagina");
    formTbl_pagina.onsubmit = function(e) {
        e.preventDefault();

        var intPag_id = document.querySelector('#pag_id').value;
        var strPag_Titulo = document.querySelector('#txtPag_Titulo').value;
        var strPag_Contenido = document.querySelector('#txtPag_Contenido').value;      
    
        if(strPag_Titulo == '' ||   strPag_Contenido== '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Tbl_paginas/setTbl_pagina'; 
        var formData = new FormData(formTbl_pagina);
        request.open("POST",ajaxUrl,true);
        request.send(formData);             
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableTbl_paginas.api().ajax.reload();
                    }else{
                        // htmlStatus = intStatus == 1 ? 
                        //     '<span class="badge badge-success">Activo</span>' : 
                        //     '<span class="badge badge-danger">Inactivo</span>';
                   
                        rowTable.cells[1].textContent = strPag_Titulo;
                        rowTable.cells[2].textContent = strPag_Contenido;
                        
                       // rowTable.cells[4].innerHTML = htmlStatus;
                        
                        rowTable = "";
                        

                    }

                    $('#modalFormTbl_pagina').modal("hide");
                    formTbl_pagina.reset();
                    swal("Tbl_paginas", objData.msg ,"success");
                    removePhoto();
                    tableTbl_paginas.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }

        
    }

},false);

$('#tableTbl_paginas').DataTable();

function openModal(){
    rowTable = "";
    document.querySelector('#pag_id').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva pagina";
    document.querySelector("#formTbl_pagina").reset();
	$('#modalFormTbl_pagina').modal('show');
    
}

// window.addEventListener('load', function() {
//     /*fntEditComunidad();
//     fntDelComunidad();
//     fntPermisos();*/
// }, false);



function fntViewInfo(pag_id){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Tbl_paginas/getTbl_pagina/'+pag_id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                // let estado = objData.data.status == 1 ? 
                // '<span class="badge badge-success">Activo</span>' : 
                // '<span class="badge badge-danger">Inactivo</span>';
                document.querySelector("#celId").innerHTML = objData.data.pag_id;
                document.querySelector("#celPag_Titulo").innerHTML = objData.data.pag_Titulo;
                document.querySelector("#celPag_Contenido").innerHTML = objData.data.pag_Contenido;
                $('#modalViewTbl_pagina').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditTbl_pagina(pag_id){
    document.querySelector('#titleModal').innerHTML ="Actualizar Comunidad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var pag_id = pag_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Tbl_paginas/getTbl_pagina/'+pag_id;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#pag_id").value = objData.data.pag_id;
                document.querySelector("#txtPag_Titulo").value = objData.data.pag_Titulo;
                document.querySelector("#txtPag_Contenido").value = objData.data.pag_Contenido;
                
                // if(objData.data.status == 1)
                // {
                //     var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                // }else{
                //     var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                // }
                // var htmlSelect = `${optionSelect}
                //                   <option value="1">Activo</option>
                //                   <option value="2">Inactivo</option>
                //                 `;

               
             //document.querySelector("#listStatus").innerHTML = htmlSelect;
            
            /////////////

           // $('#listStatus').selectpicker('render');

          


            ///////////

            
             $('#modalFormTbl_pagina').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}


function fntDelTbl_pagina(pag_id){
    swal({
        title: "Eliminar pagina",
        text: "¿Realmente quiere eliminar el Comunidad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Tbl_paginas/delTbl_pagina/';
            let strData = "pag_id="+pag_id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableTbl_paginas.api().ajax.reload();
                        
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}




