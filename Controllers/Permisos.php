<?php

class Permisos extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
	}

	public function getPermisosRol(int $idrol)
	{
		$rolid = intval($idrol);
		if ($rolid > 0) {
			$arrModulos = $this->model->selectModulos();
			$arrPermisosRol = $this->model->selectPermisosRol($rolid);
			$arrPermisos = array('ver' => 0, 'agregar' => 0, 'actualizar' => 0, 'eliminar' => 0);
			$arrPermisoRol = array('id_rol' => $rolid);

			if (empty($arrPermisosRol)) {
				for ($i = 0; $i < count($arrModulos); $i++) {

					$arrModulos[$i]['permisos'] = $arrPermisos;
				}
			} else {
				for ($i = 0; $i < count($arrModulos); $i++) {
					$arrPermisos = array('ver' => 0, 'agregar' => 0, 'actualizar' => 0, 'eliminar' => 0);
					if (isset($arrPermisosRol[$i])) {
						$arrPermisos = array(
							'ver' => $arrPermisosRol[$i]['ver'],
							'agregar' => $arrPermisosRol[$i]['agregar'],
							'actualizar' => $arrPermisosRol[$i]['actualizar'],
							'eliminar' => $arrPermisosRol[$i]['eliminar']
						);
					}
					$arrModulos[$i]['permisos'] = $arrPermisos;
				}
			}
			$arrPermisoRol['modulos'] = $arrModulos;
			$html = getModal("modalPermisos", $arrPermisoRol);
			

		}
		die();
	}

	public function setPermisos()
	{
		if ($_POST) {
			$intIdrol = intval($_POST['id_rol']);
			$modulos = $_POST['modulos'];

			$this->model->deletePermisos($intIdrol);
			foreach ($modulos as $modulo) {
				$idModulo = $modulo['id_modulo'];
				$ver = empty($modulo['ver']) ? 0 : 1;
				$agregar = empty($modulo['agregar']) ? 0 : 1;
				$actualizar = empty($modulo['actualizar']) ? 0 : 1;
				$eliminar = empty($modulo['eliminar']) ? 0 : 1;
				$requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $ver, $agregar, $actualizar, $eliminar);
			}
			if ($requestPermiso > 0) {
				$arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
			} else {
				$arrResponse = array("status" => false, "msg" => 'No es posible asignar los permisos.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
