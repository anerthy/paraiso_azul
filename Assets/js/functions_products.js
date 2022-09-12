
var tableProducts;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
// document.addEventListener('DOMContentLoaded', function(){

    tableProducts = $('#tableProducts').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Products/getProducts",
            "dataSrc":""
        },
        "columns":[
            {"data":"idproduct"},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"precio"},
            {"data":"status"},
            {"data":"telefono"},
            {"data":"proveedor"},
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
    var formProduct = document.querySelector("#formProduct");
    formProduct.onsubmit = function(e) {
        e.preventDefault();

        var intIdProduct = document.querySelector('#idProduct').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intPrecio = document.querySelector('#txtPrecio').value;
        var intStatus = document.querySelector('#listStatus').value;
        var intTelefono = document.querySelector('#txtTelefono').value;
        var strProveedor = document.querySelector('#txtProveedor').value;
        
        if(strNombre == '' || strDescripcion == '' || intPrecio == '' || intStatus == '' || intTelefono == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Products/setProduct'; 
        var formData = new FormData(formProduct);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {

                    if(rowTable == ""){
                        tableProducts.api().ajax.reload();
                    }else{
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = intPrecio;
                        rowTable.cells[4].innerHTML = htmlStatus;
                        rowTable.cells[5].innerHTML = intTelefono;
                        rowTable.cells[6].innerHTML = strProveedor;
              
                        rowTable = "";
                        

                    }


                    $('#modalFormProduct').modal("hide");
                    formProduct.reset();
                    swal("Products de usuario", objData.msg ,"success");
                    tableProducts.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
        }

        
    }

});

$('#tableProducts').DataTable();

function openModal(){

    document.querySelector('#idProduct').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Producto";
    document.querySelector("#formProduct").reset();
    $('#modalFormProduct').modal('show');
}

// window.addEventListener('load', function() {
//     //fntEditProduct();
//     //fntDelProduct();
//     /*fntPermisos();*/
// }, false);



function fntViewInfo(idproduct){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Products/getProduct/'+idproduct;
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
                document.querySelector("#celId").innerHTML = objData.data.idproduct;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celPrecio").innerHTML = objData.data.precio;
                document.querySelector("#celEstado").innerHTML = estado;           
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celProveedor").innerHTML = objData.data.proveedor;
                
                document.querySelector("#imgProduct").innerHTML = '<img src="'+objData.data.url_portada+'"></img>';
                $('#modalViewProduct').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}



function fntEditProduct(idproduct){
    document.querySelector('#titleModal').innerHTML ="Actualizar Producto";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idproduct = idproduct;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Products/getProduct/'+idproduct;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idProduct").value = objData.data.idproduct;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#txtPrecio").value = objData.data.precio;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtProveedor").value = objData.data.proveedor;
                document.querySelector('#foto_actual').value = objData.data.portada;
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
                      document.querySelector('#img').src = objData.data.url_portada;
                  }else{
                      document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_portada+">";
                  }
  
                  if(objData.data.portada == 'portada_categoria.png'){
                      document.querySelector('.delPhoto').classList.add("notBlock");
                  }else{
                      document.querySelector('.delPhoto').classList.remove("notBlock");
                  }
  
  
                  ///////////
  







                $('#modalFormProduct').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelProduct(idproduct){
    var idproduct = idproduct;
    swal({
        title: "Eliminar Producto",
        text: "¿Realmente quiere eliminar el Producto?",
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
            var ajaxUrl = base_url+'/Products/delProduct/';
            var strData = "idproduct="+idproduct;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableProducts.api().ajax.reload(function(){
                            fntEditProduct();
                            fntDelProduct();
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

