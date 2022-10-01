
var tableAlimentaciones;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
//document.addEventListener('DOMContentLoaded', function(){

    tableAlimentaciones = $('#tableAlimentaciones').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Alimentacion/getAlimentaciones",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_alimentacion"},
            {"data":"nombre_alim"},
            {"data":"descripcion"},
            {"data":"direccion"},
            {"data":"hora_apertura"},
            {"data":"hora_cierre"},
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
    var formAlimentacion = document.querySelector("#formAlimentacion");
    formAlimentacion.onsubmit = function(e) {
        e.preventDefault();

        var intId_alimentacion = document.querySelector('#id_Alimentacion').value;
        var strNombre_alim = document.querySelector('#txtNombre_alim').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strDireccion = document.querySelector('#txtDireccion').value; 
        var strHoraApertura = document.querySelector('#txtHoraApertura').value;
        var strHoraCierre = document.querySelector('#txtHoraCierre').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intStatus = document.querySelector('#listStatus').value;

        if(strNombre_alim == '' || strDescripcion == '' || strDireccion == '' || strHoraApertura == '' ||  strHoraCierre == '' ||strTelefono == '' || intStatus == '' )
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
       //  divLoading.style.display = "flex";
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Alimentacion/setAlimentacion'; 
        var formData = new FormData(formAlimentacion);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    if(rowTable == ""){
                        tableAlimentaciones.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_alim;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strDireccion;
                        rowTable.cells[5].innerHTML = strHoraApertura;
                        rowTable.cells[6].innerHTML = strHoraCierre;
                        rowTable.cells[6].innerHTML = strTelefono;
                        rowTable.cells[7].innerHTML = htmlStatus;
                     
                        rowTable = "";
                        

                    }

                    $('#modalFormAlimentacion').modal("hide");
                    formAlimentacion.reset();
                    swal("Alimentacion", objData.msg ,"success");
                    removePhoto();
                    tableAlimentaciones.api().ajax.reload();
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
    document.querySelector('#id_Alimentacion').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva alimentacion";
    document.querySelector("#formAlimentacion").reset();
    $('#modalFormAlimentacion').modal('show');
    removePhoto();
}

// window.addEventListener('load', function() {
//     /*fntEditGrupo();
//     fntDelGrupo();
//     fntPermisos();*/
// }, false);




function fntViewInfo(id_alimentacion){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Alimentacion/getAlimentacion/'+id_alimentacion;
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
                document.querySelector("#celId").innerHTML = objData.data.id_alimentacion;
                document.querySelector("#celNombre_alim").innerHTML = objData.data.nombre_alim;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celDireccion").innerHTML =  objData.data.direccion;
                document.querySelector("#celHoraApertura").innerHTML =  objData.data.hora_apertura;
                document.querySelector("#celHoraCierre").innerHTML =  objData.data.hora_cierre;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celStatus").innerHTML = objData.data.status;
                document.querySelector("#imgAlimentacion").innerHTML = '<img src="'+objData.data.url_imagen+'"></img>';
                $('#modalViewAlimentacion').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditAlimentacion(id_alimentacion){
   // rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar alimentacion";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_alimentacion = id_alimentacion;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Alimentacion/getAlimentacion/'+id_alimentacion;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id_Alimentacion").value = objData.data.id_alimentacion;
                document.querySelector("#txtNombre_alim").value = objData.data.nombre_alim;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtDireccion").value = objData.data.direccion;
                document.querySelector("#txtHoraApertura").value = objData.data.hora_apertura;
                document.querySelector("#txtHoraCierre").value = objData.data.hora_cierre;
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




             
                $('#modalFormAlimentacion').modal('show');
              
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelAlimentacion(id_alimentacion){
    swal({
        title: "Eliminar Alimentacion",
        text: "¿Realmente quiere eliminar la Alimentacion?",
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
            let ajaxUrl = base_url+'/Alimentacion/delAlimentacion';
            let strData = "id_alimentacion="+id_alimentacion;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableAlimentaciones.api().ajax.reload();
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



