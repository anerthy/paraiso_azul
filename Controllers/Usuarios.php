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

			if (empty($_POST['txtNombre']) || empty($_POST['txtCorreo']) || empty($_POST['listRol_id']) || empty($_POST['listEstado'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$id_usuario = intval($_POST['id_usuario']);
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strCorreo = strtolower(strClean($_POST['txtCorreo']));
				$intRolId = intval(strClean($_POST['listRol_id']));
				$intEstado = intval(strClean($_POST['listEstado']));

				if ($id_usuario == 0) {
					$option = 1;
					$strContraseña =  empty($_POST['txtContraseña']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtContraseña']);
					$request_user = $this->model->insertUsuario(
						$strNombre,
						$strCorreo,
						$strContraseña,
						$intRolId,
						$intEstado
					);
				} else {
					$option = 2;
					$strContraseña =  empty($_POST['txtContraseña']) ? "" : hash("SHA256", $_POST['txtContraseña']);
					$request_user = $this->model->updateUsuario(
						$id_usuario,
						$strNombre,
						$strCorreo,
						$strContraseña,
						$intRolId,
						$intEstado
					);
				}

				if ($request_user > 0) {
					if ($option == 1) {
						$arrResponse = array('estado' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('estado' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_user == 'exist') {
					$arrResponse = array('estado' => false, 'msg' => '¡Atención! el email o el nombre ya existe, ingrese otro.');
				} else {
					$arrResponse = array("estado" => false, "msg" => 'No es posible almacenar los datos.');
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

			if ($arrData[$i]['estado'] == 1) {
				$arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
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

	public function getUsuario(int $id_usuario)
	{

		$id_usuario = intval($id_usuario);
		if ($id_usuario > 0) {
			$arrData = $this->model->selectUsuario($id_usuario);
			if (empty($arrData)) {
				$arrResponse = array('estado' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('estado' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delUsuario()
	{
		if ($_POST) {
			$intIdUsuario = intval($_POST['id_usuario']);
			$requestDelete = $this->model->deleteUsuario($intIdUsuario);
			if ($requestDelete) {
				$arrResponse = array('estado' => true, 'msg' => 'Se ha eliminado el usuario');
			} else {
				$arrResponse = array('estado' => false, 'msg' => 'Error al eliminar el usuario.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
