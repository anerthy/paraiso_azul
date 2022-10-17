<?php

class Tbl_paginas extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();
		//session_start();
		//session_regenerate_id(true);
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(11);
	}

	public function Tbl_paginas()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 11;
		$data['page_tag'] = "Tabla de paginas";
		$data['page_name'] = "Tabla de paginas";
		$data['page_title'] = "Contenido de paginas";
		$data['page_functions_js'] = "functions_tbl_paginas.js";
		$this->views->getView($this, "tbl_paginas", $data);
	}

	public function getTbl_paginas()
	{
		$arrData = $this->model->selectTbl_paginas();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['pag_id'] . ')" title="Ver contenido"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditTbl_pagina" onClick="fntEditTbl_pagina(' . $arrData[$i]['pag_id'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelTbl_pagina" onClick="fntDelTbl_pagina(' . $arrData[$i]['pag_id'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectTbl_paginas()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectTbl_paginas();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				//if($arrData[$i]['status'] == 1 ){
				$htmlOptions .= '<option value="' . $arrData[$i]['pag_id'] . '">' . $arrData[$i]['pag_titulo'] . '</option>';
				//}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getTbl_pagina(int $pag_id)
	{
		$intPag_id = intval(strClean($pag_id));
		if ($intPag_id > 0) {
			$arrData = $this->model->selectTbl_pagina($intPag_id);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setTbl_pagina()
	{

		$intPag_id = intval($_POST['pag_id']);
		$strPag_Titulo = strClean($_POST['txtPag_Titulo']);
		$strPag_Contenido = strClean($_POST['txtPag_Contenido']);




		if ($intPag_id == 0) {
			//Crear
			$request_tbl_pagina = $this->model->insertTbl_pagina($strPag_Titulo, $strPag_Contenido);
			$option = 1;
		} else {
			//Actualizar

			$request_tbl_pagina = $this->model->updateTbl_pagina($intPag_id, $strPag_Titulo, $strPag_Contenido);
			$option = 2;
		}

		if ($request_tbl_pagina > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
		} else if ($request_tbl_pagina == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! la pagina ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delTbl_pagina()
	{
		if ($_POST) {
			$intPag_id = intval($_POST['pag_id']);
			$requestDelete = $this->model->deleteTbl_pagina($intPag_id);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la pagina');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una pagina.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la pagina.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
