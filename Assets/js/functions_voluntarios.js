
var tableVoluntarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableVoluntarios = $('#tableVoluntarios').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Voluntarios/getVoluntarios",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_voluntario"},
            {"data":"nombre_vol"},
            {"data":"apellido1"},
            {"data":"apellido2"},
            {"data":"cedula"},
            // {"data":"correo"},
            {"data":"telefono"},
            // {"data":"fecha_nacimiento"},
            // {"data":"genero"},
            {"data":"lugar_residencia"},
            {"data":"status"},
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


   



    //NUEVO 
    var formVoluntario = document.querySelector("#formVoluntario");
    formVoluntario.onsubmit = function(e) {
        e.preventDefault();

        var intId_Voluntario = document.querySelector('#id_Voluntario').value;
        var strNombre_vol = document.querySelector('#txtNombre_vol').value;
        var strApellido1 = document.querySelector('#txtApellido1').value;
        var strApellido2 = document.querySelector('#txtApellido2').value;      
        var strCedula = document.querySelector('#txtCedula').value;
        var strCorreo = document.querySelector('#txtCorreo').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var strFecha_nacimiento = document.querySelector('#txtFecha_nacimiento').value;
        var strGenero = document.querySelector('#txtGenero').value;
        var strLugar_residencia = document.querySelector('#txtLugar_residencia').value;
        var intStatus = document.querySelector('#listStatus').value;
       
        if(strNombre_vol == '' || strApellido1 == '' ||   strApellido2== '' ||    strCedula== '' || strCorreo== '' || strTelefono== '' || strFecha_nacimiento== '' || strGenero== '' || strLugar_residencia == '' || intStatus == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Voluntarios/setVoluntario'; 
        var formData = new FormData(formVoluntario);
        request.open("POST",ajaxUrl,true);
        request.send(formData);             
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableVoluntarios.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_vol;
                        rowTable.cells[2].textContent = strApellido1;
                        rowTable.cells[3].textContent = strApellido2;
                        rowTable.cells[4].textContent = strCedula;
                        rowTable.cells[5].textContent = strCorreo;
                        rowTable.cells[6].textContent = strTelefono;
                        rowTable.cells[7].textContent = strFecha_nacimiento;
                        rowTable.cells[8].textContent = strGenero;
                        rowTable.cells[9].textContent = strLugar_residencia;
                       rowTable.cells[10].innerHTML = htmlStatus;                        
                        rowTable = "";
                        

                    }

                    $('#modalFormVoluntario').modal("hide");
                    formVoluntario.reset();
                    swal("Voluntarios", objData.msg ,"success");
                
                    tableVoluntarios.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }

        
    }

},false);

$('#tableVoluntarios').DataTable();

function openModal(){
    rowTable = "";
    document.querySelector('#id_Voluntario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Voluntario";
    document.querySelector("#formVoluntario").reset();
	$('#modalFormVoluntario').modal('show');
   
}


function fntViewInfo(id_voluntario){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Voluntarios/getVoluntario/'+id_voluntario;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let estado = objData.data.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';
                document.querySelector("#celId_voluntatario").innerHTML = objData.data.id_voluntario;
                document.querySelector("#celNombre_vol").innerHTML = objData.data.nombre_vol;
                document.querySelector("#celApellido1").innerHTML = objData.data.apellido1;
                document.querySelector("#celApellido2").innerHTML = objData.data.apellido2;
                document.querySelector("#celCedula").innerHTML = objData.data.cedula;
                document.querySelector("#celCorreo").innerHTML = objData.data.correo;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celFecha_nacimiento").innerHTML = objData.data.fecha_nacimiento;
                document.querySelector("#celGenero").innerHTML = objData.data.genero;
                document.querySelector("#celLugar_residencia").innerHTML = objData.data.lugar_residencia;
                document.querySelector("#celEstado").innerHTML = estado;
              
                $('#modalViewVoluntario').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditVoluntario(id_voluntario){
    document.querySelector('#titleModal').innerHTML ="Actualizar Voluntario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_voluntario = id_voluntario;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Voluntarios/getVoluntario/'+id_voluntario;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {


                document.querySelector("#id_Voluntario").value = objData.data.id_voluntario;
                document.querySelector("#txtNombre_vol").value = objData.data.nombre_vol;
                document.querySelector("#txtApellido1").value = objData.data.apellido1;
                document.querySelector("#txtApellido2").value = objData.data.apellido2;
                document.querySelector("#txtCedula").value = objData.data.cedula;
                document.querySelector("#txtCorreo").value = objData.data.correo;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtFecha_nacimiento").value = objData.data.fecha_nacimiento;
                document.querySelector("#txtGenero").value = objData.data.genero;
                document.querySelector("#txtLugar_residencia").value = objData.data.lugar_residencia;
               

               
                if(objData.data.status == 1)
                {
                    var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                }else{
                    var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                }
                var htmlSelect = `${optionSelect}
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                                `;

               
             document.querySelector("#listStatus").innerHTML = htmlSelect;
            
            

            
             $('#modalFormVoluntario').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}


function fntDelVoluntario(id_voluntario){
    swal({
        title: "Eliminar Voluntario",
        text: "¿Realmente quiere eliminar el Voluntario?",
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
            let ajaxUrl = base_url+'/Voluntarios/delVoluntario/';
            let strData = "id_voluntario="+id_voluntario;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableVoluntarios.api().ajax.reload();
                        
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}








