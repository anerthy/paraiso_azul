<?php

class Voluntarios extends Controllers
{
	public function __construct()
	{
		//sessionStart();
		parent::__construct();
		session_start();
		//session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(10);
	}

	public function Voluntarios()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 10;
		$data['page_tag'] = "Voluntarios";
		$data['page_name'] = "voluntario";
		$data['page_title'] = "Voluntarios";
		$data['page_functions_js'] = "functions_voluntarios.js";
		$this->views->getView($this, "voluntarios", $data);
	}

	public function getVoluntarios()
	{
		$arrData = $this->model->selectVoluntarios();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_voluntario'] . ')" title="Ver voluntario"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditVoluntario" onClick="fntEditVoluntario(' . $arrData[$i]['id_voluntario'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelVoluntario" onClick="fntDelVoluntario(' . $arrData[$i]['id_voluntario'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			// <button class="btn btn-warning btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_voluntario'].')" title="Ver voluntario"><i class="fa fa-paper-plane"></i></button>

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			// estado
			if ($arrData[$i]['status'] == 1) {
				$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			// genero
			if ($arrData[$i]['genero'] == 'Masculino') {
				$arrData[$i]['genero'] = '<span class="badge badge-success">Masculino</span>';
			} else {
				$arrData[$i]['genero'] = '<span class="badge badge-danger">Femenino</span>';
			}
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectVoluntarios()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectVoluntarios();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['id_voluntario'] . '">' . $arrData[$i]['nombre_vol'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getVoluntario(int $id_voluntario)
	{
		$intId_voluntario = intval($id_voluntario);
		if ($intId_voluntario > 0) {
			$arrData = $this->model->selectVoluntario($intId_voluntario);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {

				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	/////  /////     /////ESTO NO FUNCIONA TODAVIA   /////   /////   /////   /////
	// public function EnvioInfo()
	// {
	// 	if ($_POST) {
	// 		error_reporting(0);

	// 		if (empty($_POST['txtEmailReset'])) {
	// 			$arrResponse = array('status' => false, 'msg' => 'Error de datos');
	// 		} else {
	// 			$token = token();
	// 			$strEmail  =  strtolower(strClean($_POST['txtEmailReset']));
	// 			$arrData = $this->model->getVoluntarioEmail($strEmail);

	// 			if (empty($arrData)) {
	// 				$arrResponse = array('status' => false, 'msg' => 'Usuario no existente.');
	// 			} else {
	// 				$id_voluntario = $arrData['id_voluntario'];
	// 				$nombre_vol = $arrData['nombre_vol'] . ' ' . $arrData['apellido1'];

	// 				$url_recovery = base_url() . '/voluntario/Informacion/' . $strEmail . '/' . $token;
	// 				$requestUpdate = $this->model->setTokenUser($id_voluntario, $token);

	// 				$dataVoluntario = array(
	// 					'nombre_vol' => $nombre_vol,
	// 					'correo' => $strCorreo,
	// 					'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
	// 					'url_recovery' => $url_recovery
	// 				);
	// 				if ($requestUpdate) {
	// 					$sendEmail = sendMailLocal($dataVoluntario, 'email_cambioPassword');

	// 					if ($sendEmail) {
	// 						$arrResponse = array(
	// 							'status' => true,
	// 							'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.'
	// 						);
	// 					} else {
	// 						$arrResponse = array(
	// 							'status' => false,
	// 							'msg' => 'No es posible realizar el proceso, intenta más tarde.'
	// 						);
	// 					}
	// 				} else {
	// 					$arrResponse = array(
	// 						'status' => false,
	// 						'msg' => 'No es posible realizar el proceso, intenta más tarde.'
	// 					);
	// 				}
	// 			}
	// 		}
	// 		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	// 	}
	// 	die();
	// }


	public function Informacion(string $params)
	{

		if (empty($params)) {
			header('Location: ' . base_url());
		} else {
			$arrParams = explode(',', $params);
			$strEmail = strClean($arrParams[0]);
			$strToken = strClean($arrParams[1]);
			$arrResponse = $this->model->getVoluntario($strEmail, $strToken);
			if (empty($arrResponse)) {
				header("Location: " . base_url());
			} else {
				$data['page_tag'] = "Cambiar contraseña";
				$data['page_name'] = "cambiar_contrasenia";
				$data['page_title'] = "Cambiar Contraseña";
				$data['email'] = $strEmail;
				$data['token'] = $strToken;
				$data['id_voluntario'] = $arrResponse['id_voluntario'];
				$data['page_functions_js'] = "functions_login.js";
				$this->views->getView($this, "cambiar_password", $data);
			}
		}
		die();
	}

	/////  /////  /////  /////  /////  /////  /////  /////  /////  /////  /////  /////  ///// 



	public function setVoluntario()
	{



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

		if ($intId_voluntario == 0) {
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
				$intStatus
			);
			$option = 1;
		} else {
			//Actualizar

			$request_voluntario = $this->model->updateVoluntario(
				$intId_voluntario,
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

		if ($request_voluntario > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
		} else if ($request_voluntario == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Voluntario ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delVoluntario()
	{



		if ($_POST) {
			$intId_voluntario = intval($_POST['id_voluntario']);
			$requestDelete = $this->model->deleteVoluntario($intId_voluntario);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el voluntario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el voluntario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
