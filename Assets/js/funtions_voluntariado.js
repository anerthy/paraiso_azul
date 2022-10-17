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