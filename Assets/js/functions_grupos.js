
var tableGrupos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){


    tableGrupos = $('#tableGrupos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Grupos/getGrupos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_grupo"},
            {"data":"nombre_grupo"},
            {"data":"descripcion"},
            
            {"data":"correo"},
            {"data":"telefono"},
            {"data":"status"},
            {"data":"nombre_com"},
            
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

    
	if(document.querySelector("#foto")){
	    let foto = document.querySelector("#foto");
	    foto.onchange = function(e) {
	        let uploadFoto = document.querySelector("#foto").value;
	        let fileimg = document.querySelector("#foto").files;
	        let nav = window.URL || window.webkitURL;
	        let contactAlert = document.querySelector('#form_alert');
	        if(uploadFoto !=''){
	            let type = fileimg[0].type;
	            let name = fileimg[0].name;
	            if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
	                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
	                if(document.querySelector('#img')){
	                    document.querySelector('#img').remove();
	                }
	                document.querySelector('.delPhoto').classList.add("notBlock");
	                foto.value="";
	                return false;
	            }else{  
	                    contactAlert.innerHTML='';
	                    if(document.querySelector('#img')){
	                        document.querySelector('#img').remove();
	                    }
	                    document.querySelector('.delPhoto').classList.remove("notBlock");
	                    let objeto_url = nav.createObjectURL(this.files[0]);
	                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
	                }
	        }else{
	            alert("No selecciono foto");
	            if(document.querySelector('#img')){
	                document.querySelector('#img').remove();
	            }
	        }
	    }
	}

	if(document.querySelector(".delPhoto")){
	    let delPhoto = document.querySelector(".delPhoto");
	    delPhoto.onclick = function(e) {
            document.querySelector("#foto_remove").value= 1;
	        removePhoto();
	    }
	}


    //NUEVO GRUPO
    var formGrupo = document.querySelector("#formGrupo");
    formGrupo.onsubmit = function(e) {
        e.preventDefault();

        var intId_Grupo = document.querySelector('#id_Grupo').value;
        var strNombre_grupo = document.querySelector('#txtNombre_grupo').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;   
        var strCorreo = document.querySelector('#txtCorreo').value; 
        var intTelefono = document.querySelector('#txtTelefono').value;
        var intNumero_integrantes = document.querySelector('#txtNumero_integrantes').value;
        var strUbicacion = document.querySelector('#txtUbicacion').value;
        var strRepresentante = document.querySelector('#txtRepresentante').value;
        var intStatus = document.querySelector('#listStatus').value;
        var intTipogrupo = document.querySelector('#listComunidad_id').value;

        if(strNombre_grupo == '' || strDescripcion == '' || intStatus == '' || strCorreo == '' || intTelefono == '' || intNumero_integrantes == '' || strUbicacion == ''|| strRepresentante == '' || intTipogrupo == '' )
        {
            alert(intTipogrupo);
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }


        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                swal("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            } 
        } 



        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Grupos/setGrupo'; 
        var formData = new FormData(formGrupo);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);

                if(objData.status)
                {
                     if(rowTable == ""){
                        tableGrupos.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_grupo;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strCorreo;
                        rowTable.cells[4].innerHTML = intTelefono;
                        rowTable.cells[5].innerHTML = intNumero_integrantes;
                        rowTable.cells[6].textContent = strUbicacion;
                        rowTable.cells[7].textContent = strRepresentante;
                        rowTable.cells[8].innerHTML = htmlStatus;
                        rowTable.cells[9].innerHTML = intTipogrupo;
                        rowTable = "";
                        

                    }


                    
                    $('#modalFormGrupo').modal("hide");
                    formGrupo.reset();
                    swal("Grupos", objData.msg ,"success");
                    removePhoto();
                    tableGrupos.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }
            }

            return false;
        }

    }
}, false);



window.addEventListener('load', function() {
    fntComunidadesGrupo();

}, false);

function fntComunidadesGrupo(){
    var ajaxUrl = base_url+'/Comunidades/getSelectComunidades';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listComunidad_id').innerHTML = request.responseText;
            document.querySelector('#listComunidad_id').value = 1;
            $('#listComunidad_id').selectpicker('render');
        }
    }
    
}


function openModal(){
    
    rowTable = "";
    document.querySelector('#id_Grupo').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Grupo";
    document.querySelector("#formGrupo").reset();
    $('#modalFormGrupo').modal('show');
    removePhoto();
}





function fntViewInfo(id_grupo){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Grupos/getGrupo/'+id_grupo;
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
                document.querySelector("#celId_grupo").innerHTML = objData.data.id_grupo;
                document.querySelector("#celNombre_grupo").innerHTML = objData.data.nombre_grupo;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;               
                document.querySelector("#celCorreo").innerHTML =  objData.data.correo;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celNumero_integrantes").innerHTML = objData.data.numero_integrantes;
                document.querySelector("#celUbicacion").innerHTML = objData.data.ubicacion;
                document.querySelector("#celRepresentante").innerHTML = objData.data.representante;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#celTipoGrupo").innerHTML = objData.data.nombre_com;
                document.querySelector("#imgGrupo").innerHTML = '<img src="'+objData.data.url_logo+'"></img>';
                $('#modalViewGrupo').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditGrupo(id_grupo){

    document.querySelector('#titleModal').innerHTML ="Actualizar Grupo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_grupo = id_grupo;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Grupos/getGrupo/'+id_grupo;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id_Grupo").value = objData.data.id_grupo;
                document.querySelector("#txtNombre_grupo").value = objData.data.nombre_grupo;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtCorreo").value = objData.data.correo;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtNumero_integrantes").value = objData.data.numero_integrantes;
                document.querySelector("#txtUbicacion").value = objData.data.ubicacion;
                document.querySelector("#txtRepresentante").value = objData.data.representante;
                document.querySelector("#listComunidad_id").value =objData.data.comunidad_id;//??
                document.querySelector('#foto_actual').value = objData.data.logo;
                document.querySelector("#foto_remove").value= 0;
          




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
                
 
                $('#listStatus').selectpicker('render');

                if(document.querySelector('#img')){
                    document.querySelector('#img').src = objData.data.url_logo;
                }else{
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_logo+">";
                }

                if(objData.data.logo == 'portada_categoria.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }


 




               
                $('#modalFormGrupo').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelGrupo(id_grupo){
    swal({
        title: "Eliminar Grupo",
        text: "¿Realmente quiere eliminar el Grupo?",
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
            let ajaxUrl = base_url+'/Grupos/delGrupo/';
            let strData = "id_grupo="+id_grupo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableGrupos.api().ajax.reload();
                        
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}


function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}


