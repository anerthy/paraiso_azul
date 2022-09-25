var tableTransportes;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
//document.addEventListener('DOMContentLoaded', function(){

    tableTransportes = $('#tableTransportes').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Transportes/getTransportes",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_transporte"},
            {"data":"nombre_trans"},
            {"data":"descripcion"},
            {"data":"clase"},
            {"data":"tipo"},
            {"data":"disponibilidad"},
            {"data":"precio"},
            {"data":"telefono"},
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
    var formTransporte = document.querySelector("#formTransporte");
    formTransporte.onsubmit = function(e) {
        e.preventDefault();

        var intId_transporte = document.querySelector('#id_Transporte').value;
        var strNombre_trans = document.querySelector('#txtNombre_trans').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strClase = document.querySelector('#txtClase').value;
        var strTipo = document.querySelector('#txtTipo').value;
        var strDisponibilidad = document.querySelector('#txtDisponibilidad').value; 
        var intPrecio = document.querySelector('#txtPrecio').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intStatus = document.querySelector('#listStatus').value;

        if(strNombre_trans == '' || strDescripcion == '' || strClase == '' || strTipo == '' || strDisponibilidad == '' || intPrecio == '' || strTelefono == '' || intStatus == '' )
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
       //  divLoading.style.display = "flex";
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Transportes/setTransporte'; 
        var formData = new FormData(formTransporte);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    if(rowTable == ""){
                        tableTransportes.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_trans;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strClase;
                        rowTable.cells[4].innerHTML = strTipo;
                        rowTable.cells[5].innerHTML = strDisponibilidad;
                        rowTable.cells[6].innerHTML = intPrecio;
                        rowTable.cells[7].innerHTML = strTelefono; 
                        rowTable.cells[8].innerHTML = htmlStatus;
                        //rowTable.cells[8].innerHTML = strImagen;
                     
                        rowTable = "";
                        

                    }

                    $('#modalFormTransporte').modal("hide");
                    formTransporte.reset();
                    swal("Transporte", objData.msg ,"success");
                    removePhoto();
                    tableTransportes.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            //divLoading.style.display = "none";
            return false;

        }
      

        
    }

},false);

//$('#tableGrupos').DataTable();

function openModal(){
    
    rowTable = "";
    document.querySelector('#id_Transporte').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo transporte";
    document.querySelector("#formTransporte").reset();
    $('#modalFormTransporte').modal('show');
    removePhoto();
}

// window.addEventListener('load', function() {
//     /*fntEditGrupo();
//     fntDelGrupo();
//     fntPermisos();*/
// }, false);




function fntViewInfo(id_transporte){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Transportes/getTransporte/'+id_transporte;
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
                document.querySelector("#celId").innerHTML = objData.data.id_transporte;
                document.querySelector("#celNombre_trans").innerHTML = objData.data.nombre_trans;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celClase").innerHTML =  objData.data.clase;
                document.querySelector("#celTipo").innerHTML =  objData.data.tipo;
                document.querySelector("#celDisponibilidad").innerHTML =  objData.data.disponibilidad;
                document.querySelector("#celPrecio").innerHTML = objData.data.precio;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celStatus").innerHTML = objData.data.status;
                document.querySelector("#imgTransporte").innerHTML = '<img src="'+objData.data.url_imagen+'"></img>';
                $('#modalViewTransporte').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditTransporte(id_transporte){
   // rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar transporte";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_transporte = id_transporte;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Transportes/getTransporte/'+id_transporte;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id_Transporte").value = objData.data.id_transporte;
                document.querySelector("#txtNombre_trans").value = objData.data.nombre_trans;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtClase").value = objData.data.clase;
                document.querySelector("#txtTipo").value = objData.data.tipo;
                document.querySelector("#txtDisponibilidad").value = objData.data.disponibilidad;
                document.querySelector("#txtPrecio").value = objData.data.precio;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector('#foto_actual').value = objData.data.imagen;
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
                
                
                /////////////

                $('#listStatus').selectpicker('render');

                if(document.querySelector('#img')){
                    document.querySelector('#img').src = objData.data.url_imagen;
                }else{
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_imagen+">";
                }

                if(objData.data.imagen == 'portada_categoria.png'){
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else{
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }


                ///////////




               
                $('#modalFormTransporte').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelTransporte(id_transporte){
    var id_transporte = id_transporte;
    swal({
        title: "Eliminar transporte",
        text: "¿Realmente quiere eliminar el transporte?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Transportes/delTransporte/';
            var strData = "id_transporte="+id_transporte;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableTransportes.api().ajax.reload(function(){
                            fntEditTransporte();
                            fntDelTransporte();
                            //fntPermisos();
                        });
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


