
var tableGalerias;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableGalerias = $('#tableGalerias').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Galerias/getGalerias",
            "dataSrc":""
        },
        "columns":[
            {"data":"gal_id_galeria"},
            {"data":"gal_descripcion"},
            {"data":"gal_ubicacion"},
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
    var formGaleria = document.querySelector("#formGaleria");
    formGaleria.onsubmit = function(e) {
        e.preventDefault();

        var intGal_Id_Galeria = document.querySelector('#Gal_id_Galeria').value;
        var strGal_Descripcion = document.querySelector('#txtGal_Descripcion').value;
        var strGal_Ubicacion = document.querySelector('#txtGal_Ubicacion').value;
     
        if(strGal_Descripcion == '' || strGal_Ubicacion == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Galerias/setGaleria'; 
        var formData = new FormData(formGaleria);
        request.open("POST",ajaxUrl,true);
        request.send(formData);             
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableGalerias.api().ajax.reload();
                    }else{
                        // htmlStatus = intStatus == 1 ? 
                        //     '<span class="badge badge-success">Activo</span>' : 
                        //     '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strGal_Descripcion;
                        rowTable.cells[2].textContent = strGal_Ubicacion;
                       // rowTable.cells[4].innerHTML = htmlStatus;
                        
                        rowTable = "";
                        

                    }

                    $('#modalFormGaleria').modal("hide");
                    formGaleria.reset();
                    swal("Galerias", objData.msg ,"success");
                    removePhoto();
                    tableGalerias.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }

        
    }

},false);

$('#tableGalerias').DataTable();

function openModal(){
    rowTable = "";
    document.querySelector('#id_Galeria').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Galeria";
    document.querySelector("#formGaleria").reset();
	$('#modalFormGaleria').modal('show');
    removePhoto();
}

// window.addEventListener('load', function() {
//     /*fntEditGaleria();
//     fntDelGaleria();
//     fntPermisos();*/
// }, false);



function fntViewInfo(gal_id_galeria){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Galerias/getGaleria/'+gal_id_galeria;
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
      
                document.querySelector("#celId").innerHTML = objData.data.gal_id_galeria;
                document.querySelector("#celDescripcion").innerHTML = objData.data.gal_descripcion;
                document.querySelector("#celUbicacion").innerHTML = objData.data.gal_ubicacion;
                document.querySelector("#imgGaleria").innerHTML = '<img src="'+objData.data.url_imagen+'"></img>';
                $('#modalViewGaleria').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}


function fntEditGaleria(gal_id_galeria){
    document.querySelector('#titleModal').innerHTML ="Actualizar Galeria";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var gal_id_galeria = gal_id_galeria;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Galerias/getGaleria/'+gal_id_galeria;
    request.open("GET",ajaxUrl ,true);
    request.send();



    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#Gal_id_Galeria").value = objData.data.gal_id_galeria;
                document.querySelector("#txtGal_Descripcion").value = objData.data.gal_descripcion;
                document.querySelector("#txtGal_Ubicacion").value = objData.data.gal_ubicacion;
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

            
             $('#modalFormGaleria').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}


function fntDelGaleria(gal_id_galeria){
    swal({
        title: "Eliminar Galeria",
        text: "¿Realmente quiere eliminar el Galeria?",
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
            let ajaxUrl = base_url+'/Galerias/delGaleria/';
            let strData = "gal_id_galeria="+gal_id_galeria;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableGalerias.api().ajax.reload();
                        
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