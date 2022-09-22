<?php

class Usuarios extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Usuarios()
	{
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "USUARIOS";
		$data['page_name'] = "usuarios";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "usuarios", $data);
	}

	public function setUsuario()
	{
		if ($_POST) {

			if (empty($_POST['txtNombre']) || empty($_POST['txtCorreo']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = intval($_POST['idUsuario']);
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strCorreo = strtolower(strClean($_POST['txtCorreo']));
				$intTipoId = intval(strClean($_POST['listRolid']));
				$intStatus = intval(strClean($_POST['listStatus']));

				if ($idUsuario == 0) {
					$option = 1;
					$strContraseña =  empty($_POST['txtContraseña']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtContraseña']);
					$request_user = $this->model->insertUsuario(
						$strNombre,
						$strCorreo,
						$strContraseña,
						$intTipoId,
						$intStatus
					);
				} else {
					$option = 2;
					$strContraseña =  empty($_POST['txtContraseña']) ? "" : hash("SHA256", $_POST['txtContraseña']);
					$request_user = $this->model->updateUsuario(
						$idUsuario,
						$strNombre,
						$strCorreo,
						$strContraseña,
						$intTipoId,
						$intStatus
					);
				}

				if ($request_user > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_user == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o el nombre de usuairo ya existe, ingrese otro.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getUsuarios()
	{
		$arrData = $this->model->selectUsuarios();
		for ($i = 0; $i < count($arrData); $i++) {

			if ($arrData[$i]['status'] == 1) {
				$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
				</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getUsuario(int $idusuario)
	{

		$idusuario = intval($idusuario);
		if ($idusuario > 0) {
			$arrData = $this->model->selectUsuario($idusuario);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delUsuario()
	{
		if ($_POST) {
			$intIdusuario = intval($_POST['idUsuario']);
			$requestDelete = $this->model->deleteUsuario($intIdusuario);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
