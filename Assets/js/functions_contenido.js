
var tableContenido;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableContenido = $('#tableContenido').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Contenido/getContenidos",
            "dataSrc":""
        },
        "columns":[
            {"data":"cont_id_contenido"},
            {"data":"cont_titulo"},
            {"data":"cont_contenido"},
            {"data":"cont_modulo"},
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

    //Nuevo Contenido
    var formContenido = document.querySelector("#formContenido");
    formContenido.onsubmit = function(e) {
        e.preventDefault();

        var intIdContenido = document.querySelector('#Cont_id_contenido').value;
        var strTitulo = document.querySelector('#txtTitulo').value;
        var strContenido = document.querySelector('#txtContenido').value;
        var strModulo = document.querySelector('#txtModulo').value;
     
        if(strTitulo == '' || strContenido == '' || strModulo == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Contenido/setContenido'; 
        var formData = new FormData(formContenido);
        request.open("POST",ajaxUrl,true);
        request.send(formData);             
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableContenido.api().ajax.reload();
                    }else{
                        rowTable.cells[1].textContent = strTitulo;
                        rowTable.cells[2].textContent = strContenido;
                        rowTable.cells[3].textContent = strModulo;
                        rowTable = "";
                        
                    }

                    $('#modalFormContenido').modal("hide");
                    formContenido.reset();
                    swal("Contenido", objData.msg ,"success");
                    tableContenido.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }

        
    }

},false);

// $('#tableContenido').DataTable();

function openModal(){
    rowTable = "";
    document.querySelector('#cont_id_contenido').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Contenido";
    document.querySelector("#formContenido").reset();
	$('#modalFormContenido').modal('show');
}

function fntViewInfo(cont_id_contenido){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Contenido/getContenido/'+cont_id_contenido;
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
      
                document.querySelector("#celId").innerHTML = objData.data.cont_id_contenido;
                document.querySelector("#celTitulo").innerHTML = objData.data.cont_titulo;
                document.querySelector("#celContenido").innerHTML = objData.data.cont_contenido;
                document.querySelector("#celModulo").innerHTML = objData.data.cont_modulo;
                $('#modalViewContenido').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditContenido(cont_id_contenido){
    document.querySelector('#titleModal').innerHTML ="Actualizar Contenido";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var cont_id_contenido = cont_id_contenido;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Contenido/getContenido/'+cont_id_contenido;
    request.open("GET",ajaxUrl ,true);
    request.send();



    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#Cont_id_contenido").value = objData.data.cont_id_contenido;
                document.querySelector("#txtTitulo").value = objData.data.cont_titulo;
                document.querySelector("#txtContenido").value = objData.data.cont_contenido;
                document.querySelector('#txtModulo').value = objData.data.cont_modulo;

             $('#modalFormContenido').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelContenido(cont_id_contenido){
    swal({
        title: "Eliminar Contenido",
        text: "¿Realmente quiere eliminar el contenido?",
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
            let ajaxUrl = base_url+'/Contenido/delContenido/';
            let strData = "cont_id_contenido="+cont_id_contenido;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableContenido.api().ajax.reload();
                        
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

