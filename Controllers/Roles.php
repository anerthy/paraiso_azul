<?php

class Roles extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(2);
	}

	public function Roles()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 2;
		$data['page_tag'] = "Roles de Usuario";
		$data['page_name'] = "rol_usuario";
		$data['page_title'] = "Roles";
		$data['page_functions_js'] = "functions_roles.js";
		$this->views->getView($this, "roles", $data);
	}

	public function getRoles()
	{
		if ($_SESSION['permisosMod']['ver']) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			$arrData = $this->model->selectRoles();

			for ($i = 0; $i < count($arrData); $i++) {
				// boton de actualizar
				if ($_SESSION['permisosMod']['actualizar']) {
					$btnView = '<button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol(' . $arrData[$i]['id_rol'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					$btnEdit = '<button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos(' . $arrData[$i]['id_rol'] . ')" title="Permisos"><i class="fas fa-key"></i></button>';
				}

				// boton de eliminar
				if ($_SESSION['permisosMod']['eliminar']) {
					if ($arrData[$i]['id_rol'] == 1) {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol(' . $arrData[$i]['id_rol'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
					}
				}

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

				// estado
				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getSelectRoles()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectRoles();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['id_rol'] . '">' . $arrData[$i]['nombre_rol'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getRol($idrol)
	{
		$intIdrol = intval(strClean($idrol));
		if ($intIdrol > 0) {
			$arrData = $this->model->selectRol($intIdrol);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setRol()
	{

		$intIdrol = intval($_POST['idRol']);
		$strRol =  strClean($_POST['txtNombre']);
		$strDescipcion = strClean($_POST['txtDescripcion']);
		$intStatus = intval($_POST['listStatus']);

		if ($intIdrol == 0) {
			//Crear
			$request_rol = $this->model->insertRol($strRol, $strDescipcion, $intStatus);
			$option = 1;
		} else {
			//Actualizar
			$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
			$option = 2;
		}

		if ($request_rol > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
		} else if ($request_rol == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delRol()
	{
		if ($_POST) {
			$intIdrol = intval($_POST['id_rol']);
			$requestDelete = $this->model->deleteRol($intIdrol);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
