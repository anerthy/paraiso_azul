<?php

class Hospedajes extends Controllers
{
	public function __construct()
	{
		sessionStart();
		parent::__construct();

		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(8);
	}

	public function Hospedajes()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 8;
		$data['page_tag'] = "Servicios de Hospedaje";
		$data['page_name'] = "hospedaje";
		$data['page_title'] = "Hospedaje";
		$data['page_functions_js'] = "functions_hospedajes.js";
		$this->views->getView($this, "hospedajes", $data);
	}

	public function getHospedajes()
	{
		$arrData = $this->model->selectHospedajes();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			// boton de ver
			if ($_SESSION['permisosMod']['ver']) {
				$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_hospedaje'] . ')" title="Ver hospedaje"><i class="far fa-eye"></i></button>';
			}

			// boton de actualizar
			if ($_SESSION['permisosMod']['actualizar']) {
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditHospedaje" onClick="fntEditHospedaje(' . $arrData[$i]['id_hospedaje'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}

			// boton de eliminar
			if ($_SESSION['permisosMod']['eliminar']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelHospedaje" onClick="fntDelHospedaje(' . $arrData[$i]['id_hospedaje'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
			}

			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

			// Estado
			if ($arrData[$i]['status'] == 1) {
				$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			if ($arrData[$i]['tipo'] == 'Camping') {
				$arrData[$i]['tipo'] = '<span>Camping</span>';
			} else {
				$arrData[$i]['tipo'] = '<span>Cabina</span>';
			}
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectHospedajes()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectHospedajes();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['id_hospedaje'] . '">' . $arrData[$i]['nombre_hosp'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getHospedaje(int $id_hospedaje)
	{
		$intId_hospedaje = intval(strClean($id_hospedaje));
		if ($intId_hospedaje > 0) {
			$arrData = $this->model->selectHospedaje($intId_hospedaje);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrData['url_imagen'] = media() . '/images/uploads/hospedaje/' . $arrData['imagen'];
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function setHospedaje()
	{



		$intId_hospedaje = intval($_POST['id_Hospedaje']);
		$strHospedaje =  strClean($_POST['txtNombre_hosp']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strTipo = strClean($_POST['txtTipo']);
		$strDireccion = strClean($_POST['txtDireccion']);
		$strTelefono = strClean($_POST['txtTelefono']);
		$intPrecio = intval($_POST['txtPrecio']);
		$intStatus = intval($_POST['listStatus']);
		





		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 	= 'portada_categoria.png';
		$request_grupo = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}






		if ($intId_hospedaje == 0) {



			//Crear
			$request_hospedaje = $this->model->insertHospedaje(
				$strHospedaje,
				$strDescripcion,
				$strTipo,
				$strDireccion,
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
					$imgImagen = $_POST['foto_actual'];
				}
			}
			$request_hospedaje = $this->model->updateHospedaje($intId_hospedaje, $strHospedaje, $strDescripcion, $strTipo, $strDireccion, $strTelefono, $intPrecio, $intStatus, $imgImagen);
			$option = 2;
		}

		if ($request_hospedaje > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('hospedaje', $foto, $imgImagen);
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				if ($nombre_foto != '') {
					uploadImage('hospedaje', $foto, $imgImagen);
				}


				if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
					|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')
				) {
					deleteFile('hospedaje', $_POST['foto_actual']);
				}
			}
		} else if ($request_hospedaje == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El hospedaje ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delHospedaje()
	{
		if ($_POST) {
			$intId_hospedaje = intval($_POST['id_hospedaje']);
			$requestDelete = $this->model->deleteHospedaje($intId_hospedaje);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el hospedaje');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al hospedaje.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}
}
