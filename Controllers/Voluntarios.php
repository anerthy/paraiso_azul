<?php 

	class Voluntarios extends Controllers{
		public function __construct()
		{
			session_start();
			session_regenerate_id(true);
			parent::__construct();	
		}

		public function Voluntarios()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Voluntarios Organizados";
			$data['page_name'] = "voluntario_usuario";
			$data['page_title'] = "Voluntarios Organizados";
			$data['page_functions_js'] = "functions_voluntarios.js";
			$this->views->getView($this,"voluntarios",$data);
		}

		public function getVoluntarios()
		{
			$arrData = $this->model->selectVoluntarios();

			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				
				<button class="btn btn-primary btn-sm btnEditVoluntario" onClick="fntEditVoluntario('.$arrData[$i]['id_voluntario'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelVoluntario" onClick="fntDelVoluntario('.$arrData[$i]['id_voluntario'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_voluntario'].')" title="Ver voluntario"><i class="far fa-eye"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getSelectVoluntarios()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectVoluntarios();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_voluntario'].'">'.$arrData[$i]['nombre_vol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getVoluntario(int $id_voluntario)
		{
			$intId_voluntario = intval($id_voluntario);
			if($intId_voluntario > 0)
			{
				$arrData = $this->model->selectVoluntario($intId_voluntario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrData['url_logo'] = media().'/images/uploads/'.$arrData['logo'];
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		
       


		public function setVoluntario(){
		
	
			
			$intId_voluntario = intval($_POST['id_Voluntario']);
			$strNombre_vol = strClean($_POST['txtNombre_vol']);
			$strApellido1 = strClean($_POST['txtApellido1']);
			$strApellido2 = strClean($_POST['txtApellido2']);
			$strCedula = strClean($_POST['txtCedula']);
			$strCorreo = strClean($_POST['txtCorreo']);
			$strTelefono = strClean($_POST['txtTelefono']);
			$strFecha_nacimiento =  strClean($_POST['txtFecha_nacimiento']);
			$strGenero = strClean($_POST['txtGenero']);
			$strLugar_residencia = strClean($_POST['txtLugar_residencia']);
            $intStatus = intval($_POST['listStatus']);



			

      
			if($intId_voluntario == 0)
			{
				//Crear
				
				$request_voluntario = $this->model->insertVoluntario(
                $strNombre_vol,
                $strApellido1,
                $strApellido2, 
                $strCedula,
                $strCorreo, 
                $strTelefono, 
                $strFecha_nacimiento,
                $strGenero,
                $strLugar_residencia,
                $intStatus );
				$option = 1;

			}else{
				//Actualizar
			
				$request_voluntario = $this->model->updateVoluntario($intId_voluntario,
                $strNombre_vol,
                $strApellido1,
                $strApellido2, 
                $strCedula,
                $strCorreo, 
                $strTelefono, 
                $strFecha_nacimiento,
                $strGenero,
                $strLugar_residencia,
                $intStatus
                );
				$option = 2;
			}

			if($request_voluntario > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					


				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					

					
				

				}
			}else if($request_voluntario == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Voluntario ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delVoluntario()
		{
			


			if($_POST){
				$intId_voluntario = intval($_POST['id_voluntario']);
				$requestDelete = $this->model->deleteVoluntario($intId_voluntario);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el voluntario');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el voluntario.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();

		}

	}
 ?>