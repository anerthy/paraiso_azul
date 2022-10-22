<?php

class Galerias extends Controllers
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
		getPermisos(12);
	}

	public function Galerias()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 12;
		$data['page_tag'] = "Galeria";
		$data['page_name'] = "galeria";
		$data['page_title'] = "Galeria";
		$data['page_functions_js'] = "functions_galerias.js";
		$this->views->getView($this, "galerias", $data);
	}

	public function getGalerias()
	{
		$arrData = $this->model->selectGalerias();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['gal_id_galeria'] . ')" title="Ver galeria"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditGaleria" onClick="fntEditGaleria(' . $arrData[$i]['gal_id_galeria'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelGaleria" onClick="fntDelGaleria(' . $arrData[$i]['gal_id_galeria'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectGalerias()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectGalerias();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				//if($arrData[$i]['status'] == 1 ){
				$htmlOptions .= '<option value="' . $arrData[$i]['gal_id_galeria'] . '">' . $arrData[$i]['gal_descripcion'] . '</option>';
				//}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getGaleria(int $gal_id_galeria)
	{
		$intGal_Id_galeria = intval(strClean($gal_id_galeria));
		if ($intGal_Id_galeria > 0) {
			$arrData = $this->model->selectGaleria($intGal_Id_galeria);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_gal_imagen'] = media() . '/images/uploads/galeria/' . $arrData['gal_imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setGaleria()
	{

		$intGal_Id_galeria = intval($_POST['Gal_id_Galeria']);
		$strGal_Descripcion =  strClean($_POST['txtGal_Descripcion']);
		$strGal_Ubicacion = strClean($_POST['txtGal_Ubicacion']);


		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$gal_imagen	= 'portada_categoria.png';
		$request_grupo = "";
		if ($nombre_foto != '') {
			$gal_imagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}



		if ($intGal_Id_galeria == 0) {
			//Crear
			$request_galeria = $this->model->insertGaleria($strGal_Descripcion, $strGal_Ubicacion, $gal_imagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_galeria = $this->model->updateGaleria($intGal_Id_galeria, $strGal_Descripcion, $strGal_Ubicacion, $gal_imagen);
			$option = 2;
		}

		if ($request_galeria > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('galeria', $foto, $gal_imagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('galeria', $foto, $gal_imagen);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')
				) {
					deleteFile('galeria', $_POST['foto_actual']);
				}
			}
		} else if ($request_galeria == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Galeria ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delGaleria()
	{
		if ($_POST) {
			$intGal_Id_galeria = intval($_POST['gal_id_galeria']);
			$requestDelete = $this->model->deleteGaleria($intGal_Id_galeria);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Galeria');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Galeria asociado a un grupo.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Galeria.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
