<?php

class Tours extends Controllers
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
		getPermisos(8);
	}

	public function Tours()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 7;
		$data['page_tag'] = "Tours";
		$data['page_name'] = "tour";
		$data['page_title'] = "Tours";
		$data['page_functions_js'] = "functions_tours.js";
		$this->views->getView($this, "tours", $data);
	}

	public function getTours()
	{
		$arrData = $this->model->selectTours();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_tour'] . ')" title="Ver tour"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditTour" onClick="fntEditTour(' . $arrData[$i]['id_tour'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelTour" onClick="fntDelTour(' . $arrData[$i]['id_tour'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
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
		die();
	}

	public function getSelectTours()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectTours();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['id_tour'] . '">' . $arrData[$i]['nombre_tour'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getTour(int $id_tour)
	{
		$intId_tour = intval($id_tour);
		if ($intId_tour > 0) {
			$arrData = $this->model->selectTour($intId_tour);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/' . $arrData['imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}






	public function setTour()
	{

		$intId_tour = intval($_POST['id_Tour']);
		$strNombre_tour = strClean($_POST['txtNombre_tour']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strActividad = strClean($_POST['txtActividad']);
		$strAlimentacion = strClean($_POST['txtAlimentacion']);
		$strHospedaje = strClean($_POST['txtHospedaje']);
		$strTransporte = strClean($_POST['txtTransporte']);
		$strLugar = strClean($_POST['txtLugar']);
		$strDisponibilidad = strClean($_POST['txtDisponibilidad']);
		$strHora_inicio = strClean($_POST['txtHora_inicio']);
		$strDuracion = strClean($_POST['txtDuracion']);
		$strCupo_minimo = strClean($_POST['txtCupo_minimo']);
		$strTelefono = strClean($_POST['txtTelefono']);
		$intPrecio = intval($_POST['txtPrecio']);
		$intStatus = intval($_POST['listStatus']);





		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 	= 'portada_categoria.png';
		$request_tour = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}






		if ($intId_tour == 0) {
			//Crear


			$request_tour = $this->model->insertTour(
				$strNombre_tour,
				$strDescripcion,
				$strActividad,
				$strAlimentacion,
				$strHospedaje,
				$strTransporte,
				$strLugar,
				$strDisponibilidad,
				$strHora_inicio,
				$strDuracion,
				$strCupo_minimo,
				$strTelefono,
				$intPrecio,
				$intStatus,
				$imgImagen
			);
			$option = 1;
		} else {
			//Actualizar
			if ($nombre_foto == '') {
				if ($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0) {
					$imgPortada = $_POST['foto_actual'];
				}
			}
			$request_tour = $this->model->updateTour(
				$intId_tour,
				$strNombre_tour,
				$strDescripcion,
				$strActividad,
				$strAlimentacion,
				$strHospedaje,
				$strTransporte,
				$strLugar,
				$strDisponibilidad,
				$strHora_inicio,
				$strDuracion,
				$strCupo_minimo,
				$strTelefono,
				$intPrecio,
				$intStatus,
				$imgImagen
			);
			$option = 2;
		}

		if ($request_tour > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage($foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage($foto, $imgImagen);
				}


				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')
				) {
					deleteFile($_POST['foto_actual']);
				}
			}
		} else if ($request_tour == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El Tour ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delTour()
	{



		if ($_POST) {
			$intId_tour = intval($_POST['id_tour']);
			$requestDelete = $this->model->deleteTour($intId_tour);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tour');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el tour.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
