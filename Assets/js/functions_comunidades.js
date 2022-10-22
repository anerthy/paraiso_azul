
var tableComunidades;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableComunidades = $('#tableComunidades').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Comunidades/getComunidades",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_comunidad"},
            {"data":"nombre_com"},
            {"data":"descripcion"},
            {"data":"provincia"},
            {"data":"canton"},
            {"data":"distrito"},
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



    




    //NUEVO ROL
    var formComunidad = document.querySelector("#formComunidad");
    formComunidad.onsubmit = function(e) {
        e.preventDefault();

        var intId_Comunidad = document.querySelector('#id_Comunidad').value;
        var strNombre_com = document.querySelector('#txtNombre_com').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strProvincia = document.querySelector('#txtProvincia').value;      
        var strCanton = document.querySelector('#txtCanton').value;
        var strDistrito = document.querySelector('#txtDistrito').value; 
        if(strNombre_com == '' || strDescripcion == '' ||   strProvincia== '' ||    strCanton== '' || strDistrito== '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Comunidades/setComunidad'; 
        var formData = new FormData(formComunidad);
        request.open("POST",ajaxUrl,true);
        request.send(formData);             
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableComunidades.api().ajax.reload();
                    }else{
                        // htmlStatus = intStatus == 1 ? 
                        //     '<span class="badge badge-success">Activo</span>' : 
                        //     '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre_com;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].textContent = strProvincia;
                        rowTable.cells[4].textContent = strCanton;
                        rowTable.cells[5].textContent = strDistrito;
                       // rowTable.cells[4].innerHTML = htmlStatus;
                        
                        rowTable = "";
                        

                    }

                    $('#modalFormComunidad').modal("hide");
                    formComunidad.reset();
                    swal("Comunidades", objData.msg ,"success");
                    removePhoto();
                    tableComunidades.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }

        
    }

},false);




$('#txtProvincia').on('change',function(){
    var seccionID = $('#txtProvincia').val();  
    if(seccionID == "Guanacaste"){
      $('#txtCanton').html('<option value="">Seleccione primero una provincia</option><option value="Nicoya">Nicoya</option><option value="Santa Cruz">Santa Cruz</option><option value="Bagases">Bagases</option><option value="Cañas">Cañas</option>');
      $('#txtDistrito').html('<option value="">Seleccione primero un canton</option>');
    }else if(seccionID == "Puntarenas"){
      $('#txtCanton').html('<option value="">Seleccione primero una sección</option><option value="Esparza">Esparza</option> <option value="Buenos Aires">Buenos Aires</option> <option value="Monteverde">Monteverde</option> <option value="Manzanillo">Manzanillo</option> <option value="Lepanto">Lepanto</option>');
      $('#txtDistrito').html('<option value="">Seleccione primero una categoría</option>');
    }else{
      $('#txtCanton').html('<option value="">Seleccione primero una sección</option>');
      $('#txtDistrito').html('<option value="">Seleccione primero una categoría</option>');
    }
    
    $('#txtCanton').on('change',function(){
      var categoriaID = $('#txtCanton').val();
      if(categoriaID == "Nicoya"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option><option value="San Antonio">San Antonio</option><option value="Quebrada Honda">Quebrada Honda</option>');
      }else if(categoriaID == "Santa Cruz"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option><option value="Santa Cruz">Santa Cruz</option>');
      }else if(categoriaID == "Bagases"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option><option value="Bagases">Bagases</option>');
      }else if(categoriaID == "Cañas"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option><option value="Bebedero">Bebedero</option><option value="Porozal">Porozal</option>');
      }else if(categoriaID == "Esparza"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option><option value="Esparza">Esparza</option>');
      }else if(categoriaID == "Manzanillo"){
        $('#txtDistrito').html('<option value="">Seleccione primero una distrito</option>');
      }else{
        $('#txtDistrito').html('<option value="">Seleccione primero una provincia</option>');
      }
    });
  });


$('#tableComunidades').DataTable();

function openModal(){
    rowTable = "";
    document.querySelector('#id_Comunidad').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Comunidad";
    document.querySelector("#formComunidad").reset();
	$('#modalFormComunidad').modal('show');
    removePhoto();
}

// window.addEventListener('load', function() {
//     /*fntEditComunidad();
//     fntDelComunidad();
//     fntPermisos();*/
// }, false);



function fntViewInfo(id_comunidad){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Comunidades/getComunidad/'+id_comunidad;
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
                document.querySelector("#celId").innerHTML = objData.data.id_comunidad;
                document.querySelector("#celNombre_com").innerHTML = objData.data.nombre_com;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celProvincia").innerHTML = objData.data.provincia;
                document.querySelector("#celCanton").innerHTML = objData.data.canton;
                document.querySelector("#celDistrito").innerHTML = objData.data.distrito;
                document.querySelector("#imgComunidad").innerHTML = '<img src="'+objData.data.url_imagen+'"></img>';
                $('#modalViewComunidad').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditComunidad(id_comunidad){
    document.querySelector('#titleModal').innerHTML ="Actualizar Comunidad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var id_comunidad = id_comunidad;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Comunidades/getComunidad/'+id_comunidad;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id_Comunidad").value = objData.data.id_comunidad;
                document.querySelector("#txtNombre_com").value = objData.data.nombre_com;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtProvincia").value = objData.data.provincia;
                document.querySelector("#txtCanton").value = objData.data.canton;
                document.querySelector("#txtDistrito").value = objData.data.distrito;
                document.querySelector('#foto_actual').value = objData.data.imagen;
                document.querySelector("#foto_remove").value= 0;


                

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

            
             $('#modalFormComunidad').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}


function fntDelComunidad(id_comunidad){
    swal({
        title: "Eliminar Comunidad",
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
            let ajaxUrl = base_url+'/Comunidades/delComunidad/';
            let strData = "id_comunidad="+id_comunidad;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableComunidades.api().ajax.reload();
                        
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