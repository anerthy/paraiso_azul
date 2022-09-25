
<?php

class Transportes extends Controllers
{
	public function __construct()
	{
		session_start();
		session_regenerate_id(true);
		parent::__construct();
	}

	public function Transportes()
	{
		$data['page_id'] = 3;
		$data['page_tag'] = "Transporte";
		$data['page_name'] = "transporte";
		$data['page_title'] = "Transporte";
		$data['page_functions_js'] = "functions_transportes.js";
		$this->views->getView($this, "transportes", $data);
	}

	public function getTransportes()
	{
		$arrData = $this->model->selectTransportes();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';


			if ($arrData[$i]['status'] == 1) {
				$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
			} else {
				$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
			}

			$arrData[$i]['options'] = '<div class="text-center">
				
				<button class="btn btn-primary btn-sm btnEditTransporte" onClick="fntEditTransporte(' . $arrData[$i]['id_transporte'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelTransporte" onClick="fntDelTransporte(' . $arrData[$i]['id_transporte'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_transporte'] . ')" title="Ver transporte"><i class="far fa-eye"></i></button>
				</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getSelectTransportes()
	{
		$htmlOptions = "";
		$arrData = $this->model->selectTransportes();
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
					$htmlOptions .= '<option value="' . $arrData[$i]['id_transporte'] . '">' . $arrData[$i]['nombre_trans'] . '</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}

	public function getTransporte(int $id_transporte)
	{
		$intId_transporte = intval(strClean($id_transporte));
		if ($intId_transporte > 0) {
			$arrData = $this->model->selectTransporte($intId_transporte);
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

	public function setTransporte()
	{



		$intId_transporte = intval($_POST['id_Transporte']);
		$strTransporte =  strClean($_POST['txtNombre_trans']);
		$strDescripcion = strClean($_POST['txtDescripcion']);
		$strClase = strClean($_POST['txtClase']);
		$strTipo = strClean($_POST['txtTipo']);
		$strDisponibilidad = strClean($_POST['txtDisponibilidad']);
		$intPrecio = intval($_POST['txtPrecio']);
		$strTelefono = strClean($_POST['txtTelefono']);
		$intStatus = intval($_POST['listStatus']);
		//$strImagen = strClean($_POST['txtImagen']);





		$foto   	= $_FILES['foto'];
		$nombre_foto 	= $foto['name'];
		$type 		 	= $foto['type'];
		$url_temp    	= $foto['tmp_name'];
		$imgImagen 	= 'portada_categoria.png';
		$request_grupo = "";
		if ($nombre_foto != '') {
			$imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
		}






		if ($intId_transporte == 0) {



			//Crear
			$request_transporte = $this->model->insertTransporte(
				$strTransporte,
				$strDescripcion,
				$strClase,
				$strTipo,
				$strDisponibilidad,
				$intPrecio,
				$strTelefono,
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
			$request_transporte = $this->model->updateTransporte($intId_transporte, $strTransporte, $strDescripcion, $strClase, $strTipo, $strDisponibilidad, $intPrecio,$strTelefono, $intStatus, $imgImagen);
			$option = 2;
		}

		if ($request_transporte > 0) {
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
		} else if ($request_transporte == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! El transporte ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function delTransporte()
	{

		if ($_POST) {
			$intId_transporte = intval($_POST['id_transporte']);
			$requestDelete = $this->model->deleteTransporte($intId_transporte);
			if ($requestDelete) {
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el transporte');
			} else {
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el transporte.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
