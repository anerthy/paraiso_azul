
var tableTours;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){


    tableTours = $('#tableTours').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Tours/getTours",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_tour"},
            {"data":"nombre_tour"},
            {"data":"descripcion"},
            {"data":"servicio"},
            {"data":"actividad"},
            {"data":"alimentacion"},
            {"data":"hospedaje"},
            {"data":"transporte"},
            {"data":"lugar"},
            {"data":"disponibilidad"},
            {"data":"hora_inicio"},
            {"data":"duracion"},
            {"data":"cupo_minimo"},
            {"data":"telefono"},
            {"data":"precio"},
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


    //NUEVO tour
    var formTour = document.querySelector("#formTour");
    formTour.onsubmit = function(e) {
        e.preventDefault();

        var intId_Tour = document.querySelector('#id_Tour').value;
        var strNombre_tour = document.querySelector('#txtNombre_tour').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;  
        var strServicio = document.querySelector('#txtServicio').value; 
        var strActividad = document.querySelector('#txtActividad').value;
        var strAlimentacion = document.querySelector('#txtAlimentacion').value;
        var strHospedaje = document.querySelector('#txtHospedaje').value;
        var strTransporte = document.querySelector('#txtTransporte').value;
        var strLugar = document.querySelector('#txtLugar').value;
        var strDisponibilidad = document.querySelector('#txtDisponibilidad').value;
        var strHora_inicio = document.querySelector('#txtHora_inicio').value;
        var strDuracion = document.querySelector('#txtDuracion').value;
        var strCupo_minimo = document.querySelector('#txtCupo_minimo').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var strPrecio = document.querySelector('#txtPrecio').value;
        var intStatus = document.querySelector('#listStatus').value;



        if(strNombre_tour == '' || strDescripcion == '' || strServicio == '' || strActividad == '' 
        || strAlimentacion == '' || strHospedaje == '' || strTransporte == ''|| strLugar == '' 
        || strDisponibilidad == '' || strHora_inicio == '' || strDuracion == '' || strDuracion == '' 
        || strCupo_minimo == '' || strTelefono == '' || strPrecio == '' || intStatus == ''  )
        {
            alert(intTipotour);
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


       //  divLoading.style.display = "flex";
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Tours/setTour'; 
        var formData = new FormData(formTour);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);

                if(objData.status)
                {
                     if(rowTable == ""){
                        tableTours.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_tour;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].textContent = strServicio;
                        rowTable.cells[4].innerHTML = strActividad;
                        rowTable.cells[5].innerHTML = strAlimentacion;
                        rowTable.cells[6].textContent = strHospedaje;
                        rowTable.cells[7].textContent = strTransporte;
                        rowTable.cells[8].textContent = strLugar;
                        rowTable.cells[9].innerHTML = strDisponibilidad;
                        rowTable.cells[10].innerHTML = strHora_inicio;
                        rowTable.cells[11].innerHTML = strDuracion;
                        rowTable.cells[12].innerHTML = strCupo_minimo;
                        rowTable.cells[13].innerHTML = strTelefono;
                        rowTable.cells[14].innerHTML = strPrecio;
                        rowTable.cells[15].innerHTML = htmlStatus;
                        rowTable = "";
               

                    }


                    
                    $('#modalFormTour').modal("hide");
                    formTour.reset();
                    swal("Tours", objData.msg ,"success");
                    removePhoto();
                    tableTours.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }
            }
            //divLoading.style.display = "none";
            return false;
        }

    }
}, false);


window.addEventListener('load', function() {
    //fntComunidadesTour();
    /*fntViewUsuario();
    fntEditUsuario();
    fntDelUsuario();*/
}, false);


////LLAMA DATOS DE OTRAS TABLAS
// function fntComunidadesTour(){
//     var ajaxUrl = base_url+'/Comunidades/getSelectComunidades';
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     request.open("GET",ajaxUrl,true);
//     request.send();

//     request.onreadystatechange = function(){
//         if(request.readyState == 4 && request.status == 200){
//             document.querySelector('#listComunidad_id').innerHTML = request.responseText;
//             document.querySelector('#listComunidad_id').value = 1;
//             $('#listComunidad_id').selectpicker('render');
//         }
//     }
    
// }
//$('#tableTours').DataTable();

function openModal(){
    
    rowTable = "";
    document.querySelector('#id_Tour').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tour";
    document.querySelector("#formTour").reset();
    $('#modalFormTour').modal('show');
    removePhoto();
}

// window.addEventListener('load', function() {
//     /*fntEditTour();
//     fntDelTour();
//     fntPermisos();*/
// }, false);




function fntViewInfo(id_tour){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Tours/getTour/'+id_tour;
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
                document.querySelector("#celId_tour").innerHTML = objData.data.id_tour;
                document.querySelector("#celNombre_tour").innerHTML = objData.data.nombre_tour;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;               
                document.querySelector("#celServicio").innerHTML =  objData.data.servicio;
                document.querySelector("#celActividad").innerHTML = objData.data.actividad;
                document.querySelector("#celAlimentacion").innerHTML = objData.data.alimentacion;
                document.querySelector("#celHospedaje").innerHTML = objData.data.hospedaje;
                document.querySelector("#celTransporte").innerHTML = objData.data.transporte;
                document.querySelector("#celLugar").innerHTML = objData.data.lugar;
                document.querySelector("#celDisponibilidad").innerHTML = objData.data.disponibilidad;
                document.querySelector("#celHora_inicio").innerHTML = objData.data.hora_inicio;
                document.querySelector("#celDuracion").innerHTML = objData.data.duracion;
                document.querySelector("#celCupo_minimo").innerHTML = objData.data.cupo_minimo;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celPrecio").innerHTML = objData.data.precio;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#imgTour").innerHTML = '<img src="'+objData.data.url_logo+'"></img>';
                $('#modalViewTour').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}





function fntEditTour(id_tour){
    //rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Tour";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_tour = id_tour;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Tours/getTour/'+id_tour;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id_Tour").value = objData.data.id_tour;
                document.querySelector("#txtNombre_tour").value = objData.data.nombre_tour;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtServicio").value = objData.data.servicio;
                document.querySelector("#txtActividad").value = objData.data.actividad;
                document.querySelector("#txtAlimentacion").value = objData.data.alimentacion;
                document.querySelector("#txtHospedaje").value = objData.data.hospedaje;
                document.querySelector("#txtTransporte").value = objData.data.transporte;
                document.querySelector("#txtLugar").value = objData.data.lugar;
                document.querySelector("#txtDisponibilidad").value = objData.data.disponibilidad;
                document.querySelector("#txtHora_inicio").value = objData.data.hora_inicio;
                document.querySelector("#txtDuracion").value = objData.data.duracion;
                document.querySelector("#txtCupo_minimo").value = objData.data.cupo_minimo;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtPrecio").value = objData.data.precio;
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




               
                $('#modalFormTour').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}



function fntDelTour(id_tour){
    swal({
        title: "Eliminar Tour",
        text: "¿Realmente quiere eliminar el Tour?",
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
            let ajaxUrl = base_url+'/Tours/delTour/';
            let strData = "id_tour="+id_tour;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableTours.api().ajax.reload();
                        
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


