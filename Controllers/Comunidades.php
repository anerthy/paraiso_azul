<?php

class Comunidades extends Controllers
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
		getPermisos(5);
	}

	public function Comunidades()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 5;
		$data['page_tag'] = "Comunidades";
		$data['page_name'] = "comunidad_usuario";
		$data['page_title'] = "Comunidades";
		$data['page_functions_js'] = "functions_comunidades.js";
		$this->views->getView($this, "comunidades", $data);
	}

	public function getComunidades()
	{
		$arrData = $this->model->selectComunidades();

		for ($i = 0; $i < count($arrData); $i++) {

			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_comunidad'] . ')" title="Ver comunidad"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditComunidad" onClick="fntEditComunidad(' . $arrData[$i]['id_comunidad'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelComunidad" onClick="fntDelComunidad(' . $arrData[$i]['id_comunidad'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			/////Provincia
			if ($arrData[$i]['provincia'] == "Puntarenas") {

				$arrData[$i]['provincia'] = '<span>Puntarenas</span>';
			} elseif ($arrData[$i]['provincia'] == "Guanacaste") {

				$arrData[$i]['provincia'] = '<span>Guanacaste</span>';
			}

			/////Canton



			if ($arrData[$i]['canton'] == 'Nicoya') {
				$arrData[$i]['canton'] = '<span>Nicoya</span>';
			} elseif ($arrData[$i]['canton'] == 'Santa Cruz') {
				$arrData[$i]['canton'] = '<span>Santa Cruz</span>';
			} elseif ($arrData[$i]['canton'] == 'Bagases') {
				$arrData[$i]['canton'] = '<span>Bagases</span>';
			} elseif ($arrData[$i]['canton'] == 'Cañas') {
				$arrData[$i]['canton'] = '<span>Cañas</span>';
			}


			if ($arrData[$i]['canton'] == 'Esparza') {
				$arrData[$i]['canton'] = '<span>Esparza</span>';
			} elseif ($arrData[$i]['canton'] == 'Buenos Aires') {
				$arrData[$i]['canton'] = '<span>Buenos Aires</span>';
			} elseif ($arrData[$i]['canton'] == 'Monteverde') {
				$arrData[$i]['canton'] = '<span>Monteverde</span>';
			} elseif ($arrData[$i]['canton'] == 'Manzanillo') {
				$arrData[$i]['canton'] = '<span>Manzanillo</span>';
			} elseif ($arrData[$i]['canton'] == 'Lepanto') {
				$arrData[$i]['canton'] = '<span>Lepanto</span>';
			}


			///Distrito
			if ($arrData[$i]['distrito'] == 'Chomes') {
				$arrData[$i]['distrito'] = '<span>Chomes</span>';
			} elseif ($arrData[$i]['distrito'] == 'Lepanto') {
				$arrData[$i]['distrito'] = '<span>Lepanto</span>';
			} elseif ($arrData[$i]['distrito'] == 'Manzanillo') {
				$arrData[$i]['distrito'] = '<span>Manzanillo</span>';
			} elseif ($arrData[$i]['distrito'] == 'San Antonio') {
				$arrData[$i]['distrito'] = '<span>San Antonio</span>';
			} elseif ($arrData[$i]['distrito'] == 'Quebrada Honda') {
				$arrData[$i]['distrito'] = '<span>Quebrada Honda</span>';
			} elseif ($arrData[$i]['distrito'] == 'Bebedero') {
				$arrData[$i]['distrito'] = '<span>Bebedero</span>';
			} elseif ($arrData[$i]['distrito'] == 'Porozal') {
				$arrData[$i]['distrito'] = '<span>Porozal</span>';
			}
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectComunidades()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectComunidades();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				//if($arrData[$i]['status'] == 1 ){
				$htmlOptions .= '<option value="' . $arrData[$i]['id_comunidad'] . '">' . $arrData[$i]['nombre_com'] . '</option>';
				//}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getComunidad(int $id_comunidad)
	{
		$intId_comunidad = intval(strClean($id_comunidad));
		if ($intId_comunidad > 0) {
			$arrData = $this->model->selectComunidad($intId_comunidad);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/comunidades/' . $arrData['imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setComunidad()
	{

		$intId_comunidad = intval($_POST['id_Comunidad']);
		$strComunidad =  strClean($_POST['txtNombre_com']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strProvincia = strClean($_POST['txtProvincia']);
		$strCanton = strClean($_POST['txtCanton']);
		$strDistrito = strClean($_POST['txtDistrito']);

		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen	= 'portada_categoria.png';
		$request_grupo = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}



		if ($intId_comunidad == 0) {
			//Crear
			$request_comunidad = $this->model->insertComunidad($strComunidad, $strDescripcion, $strProvincia, $strCanton, $strDistrito, $imgImagen);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0) {
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_comunidad = $this->model->updateComunidad($intId_comunidad, $strComunidad, $strDescripcion, $strProvincia, $strCanton, $strDistrito, $imgImagen);
			$option = 2;
		}

		if ($request_comunidad > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('comunidades', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('comunidades', $foto, $imgImagen);
				}

				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')
				) {
					deleteFile('comunidades', $_POST['foto_actual']);
				}
			}
		} else if ($request_comunidad == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Comunidad ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delComunidad()
	{
		if ($_POST) {
			$intId_comunidad = intval($_POST['id_comunidad']);
			$requestDelete = $this->model->deleteComunidad($intId_comunidad);
			if ($requestDelete == 'ok') {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Comunidad');
			} else if ($requestDelete == 'exist') {
				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Comunidad asociado a un grupo.');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Comunidad.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
