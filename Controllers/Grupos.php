<?php 

	class Grupos extends Controllers{
		public function __construct()
		{
			session_start();
			session_regenerate_id(true);
			parent::__construct();	
		}

		public function Grupos()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Grupos Organizados";
			$data['page_name'] = "grupo_usuario";
			$data['page_title'] = "Grupos Organizados ";
			$data['page_functions_js'] = "functions_grupos.js";
			$this->views->getView($this,"grupos",$data);
		}

		public function getGrupos()
		{
			$arrData = $this->model->selectGrupos();

			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				
				<button class="btn btn-primary btn-sm btnEditGrupo" onClick="fntEditGrupo('.$arrData[$i]['idgrupo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelGrupo" onClick="fntDelGrupo('.$arrData[$i]['idgrupo'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idgrupo'].')" title="Ver grupo"><i class="far fa-eye"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getSelectGrupos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectGrupos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idgrupo'].'">'.$arrData[$i]['nombregrupo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getGrupo(int $idgrupo)
		{
			$intIdgrupo = intval(strClean($idgrupo));
			if($intIdgrupo > 0)
			{
				$arrData = $this->model->selectGrupo($intIdgrupo);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setGrupo(){

	
			
			$intIdgrupo = intval($_POST['idGrupo']);
			$strGrupo =  strClean($_POST['txtNombre']);
			$strDescripcion = strClean($_POST['txtDescripcion']);
			$intStatus = intval($_POST['listStatus']);
			$strCorreo = strClean($_POST['txtCorreo']);
			$intTelefono = intval($_POST['txtTelefono']);
			$intIntegrantes = intval($_POST['txtIntegrantes']);
			$strUbicacion = strClean($_POST['txtUbicacion']);




			        $foto   	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$imgPortada 	= 'portada_categoria.png';
					$request_grupo = "";
					if($nombre_foto != ''){
						$imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
					}






			if($intIdgrupo == 0)
			{
				//Crear
				$request_grupo = $this->model->insertGrupo($strGrupo, $strDescripcion,$intStatus,
				$strCorreo, $intTelefono, $intIntegrantes,$strUbicacion, $imgPortada);
				$option = 1;
			}else{
				//Actualizar
				if($nombre_foto == ''){
					if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
						$imgPortada = $_POST['foto_actual'];
					}
				}
				$request_grupo = $this->model->updateGrupo($intIdgrupo, $strGrupo, $strDescripcion, $intStatus,$strCorreo, $intTelefono, $intIntegrantes,$strUbicacion ,$imgPortada );
				$option = 2;
			}

			if($request_grupo > 0 )
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }


				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

					
					if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
								|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
								deleteFile($_POST['foto_actual']);
							}

				}
			}else if($request_grupo == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Grupo ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delGrupo()
		{
			// if($_POST){
			// 	$intIdgrupo = intval($_POST['idgrupo']);
			// 	$requestDelete = $this->model->deleteGrupo($intIdgrupo);
			// 	if($requestDelete)
			// 	{
			// 		$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Grupo');
			// 	}else if($requestDelete == 'exist'){
			// 		$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Grupo asociado a usuarios.');
			// 	}else{
			// 		$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Grupo.');
			// 	}
			// 	echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			// }
			// die();


			if($_POST){
				$intIdgrupo = intval($_POST['idgrupo']);
				$requestDelete = $this->model->deleteGrupo($intIdgrupo);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el grupo');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el grupo.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();

		}

	}
 ?>