<?php

class Usuarios extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
	
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(3);
	}

	public function Usuarios()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Usuarios del sistema";
		$data['page_title'] = "Usuario";
		$data['page_name'] = "usuarios";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "usuarios", $data);
	}

	public function setUsuario()
	{
		if ($_POST) {
			if (($_SESSION['permisosMod']['agregar']) || ($_SESSION['permisosMod']['actualizar'])) {

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
		}
		die();
	}

	public function getUsuarios()
	{
		if ($_SESSION['permisosMod']['ver']) {
			$arrData = $this->model->selectUsuarios();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				// boton de ver
				if ($_SESSION['permisosMod']['ver']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
				}
				// boton de actualizar
				if ($_SESSION['permisosMod']['actualizar']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['id_rol'] == 1) ||
						($_SESSION['userData']['id_rol'] == 1 and $arrData[$i]['id_rol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['id_usuario'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				// boton de eliminar
				if ($_SESSION['permisosMod']['eliminar']) {
					if (($_SESSION['idUser'] == 1 and $_SESSION['userData']['id_rol'] == 1) ||
						($_SESSION['userData']['id_rol'] == 1 and $arrData[$i]['id_rol'] != 1) and
						($_SESSION['userData']['id_usuario'] != $arrData[$i]['id_usuario'])
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['id_usuario'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}

				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getUsuario($idusuario)
	{
		if ($_SESSION['permisosMod']['ver']) {
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
		}
		die();
	}

	public function delUsuario()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['eliminar']) {
				$intIdusuario = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteUsuario($intIdusuario);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
	public function perfil()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "perfil", $data);
	}
}
