var tableVoluntarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");


    
document.addEventListener('DOMContentLoaded', function(){

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
        var ajaxUrl = base_url +'/Voluntariado/setVoluntario'; 
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
                        rowTable = "";
                        

                    }      
                     $('#modalFormVoluntariado').modal("hide"); 
                    alert('El voluntario registrado')
                     formVoluntario.reset();
                    swal("Voluntariado", objData.msg ,"success");
                    tableVoluntarios.api().ajax.reload();
                
                 }
                else{
                    alert('El voluntario ya esta registrado, revisar los datos')
                     swal("El voluntario ya esta registrado");
                 } 
                       
            } 
          
            return false;
        }

        
    }

},false);

function openModal(){
    rowTable = "";
  
    document.querySelector('#id_Voluntario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    
    document.querySelector("#formVoluntario").reset();
	$('#modalFormVoluntariado').modal('show');
   
}
