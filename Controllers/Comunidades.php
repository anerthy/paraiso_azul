<?php 

	class Comunidades extends Controllers{
		public function __construct()
		{
			session_start();
			session_regenerate_id(true);
			parent::__construct();
		}

		public function Comunidades()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Comunidades";
			$data['page_name'] = "comunidad_usuario";
			$data['page_title'] = "Comunidades";
			$data['page_functions_js'] = "functions_comunidades.js";
			$this->views->getView($this,"comunidades",$data);
		}

		public function getComunidades()
		{
			$arrData = $this->model->selectComunidades();

			for ($i=0; $i < count($arrData); $i++) {
				//$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				// if($arrData[$i]['status'] == 1)
				// {
				// 	$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				// }else{
				// 	$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				// }

				$arrData[$i]['options'] = '<div class="text-center">
				
				<button class="btn btn-primary btn-sm btnEditComunidad" onClick="fntEditComunidad('.$arrData[$i]['id_comunidad'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelComunidad" onClick="fntDelComunidad('.$arrData[$i]['id_comunidad'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_comunidad'].')" title="Ver comunidad"><i class="far fa-eye"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getSelectComunidades()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectComunidades();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					//if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_comunidad '].'">'.$arrData[$i]['nombre_com'].'</option>';
					//}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getComunidad(int $id_comunidad)
		{
			$intId_comunidad = intval(strClean($id_comunidad));
			if($intId_comunidad > 0)
			{
				$arrData = $this->model->selectComunidad($intId_comunidad);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrData['url_imagen'] = media().'/images/uploads/'.$arrData['imagen'];
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setComunidad(){
			
			$intId_comunidad = intval($_POST['id_Comunidad']);
			$strComunidad =  strClean($_POST['txtNombre_com']);
			
			$strDescripcion = strClean($_POST['txtDescripcion']);
			$strUbicacion = strClean($_POST['txtUbicacion']);
			//$intStatus = intval($_POST['listStatus']);



			$foto   	= $_FILES['foto'];
			$nombre_foto 	= $foto['name'];
			$type 		 	= $foto['type'];
			$url_temp    	= $foto['tmp_name'];
			$imgImagen	= 'portada_categoria.png';
			$request_grupo = "";
			if($nombre_foto != ''){
				$imgImagen = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
			}

			

			if($intId_comunidad == 0)
			{
				//Crear
			$request_comunidad = $this->model->insertComunidad($strComunidad, $strDescripcion,$strUbicacion/*,$intStatus*/,$imgImagen);
				$option = 1;
			}else{
				//Actualizar
				if($nombre_foto == ''){
					if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
						$imgImagen = $_POST['foto_actual'];
					}
				}
				$request_comunidad = $this->model->updateComunidad($intId_comunidad, $strComunidad, $strDescripcion, $strUbicacion/*, $intStatus*/,$imgImagen);
				$option = 2;
			}

			if($request_comunidad > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					if($nombre_foto != ''){ uploadImage($foto,$imgImagen); }

				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					if($nombre_foto != ''){ uploadImage($foto,$imgImagen); }

					if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
								|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
								deleteFile($_POST['foto_actual']);
							}


				}
			}else if($request_comunidad == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Comunidad ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delComunidad()
		{
			if($_POST){
				$intId_comunidad = intval($_POST['id_comunidad']);
				$requestDelete = $this->model->deleteComunidad($intId_comunidad);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Comunidad');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Comunidad asociado a usuarios.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Comunidad.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	}
 ?>