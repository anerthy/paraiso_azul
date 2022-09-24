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
				
				<button class="btn btn-primary btn-sm btnEditGrupo" onClick="fntEditGrupo('.$arrData[$i]['id_grupo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelGrupo" onClick="fntDelGrupo('.$arrData[$i]['id_grupo'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_grupo'].')" title="Ver grupo"><i class="far fa-eye"></i></button>
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
					$htmlOptions .= '<option value="'.$arrData[$i]['id_grupo'].'">'.$arrData[$i]['nombre_grupo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getGrupo(int $id_grupo)
		{
			$intId_grupo = intval($id_grupo);
			if($intId_grupo > 0)
			{
				$arrData = $this->model->selectGrupo($intId_grupo);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrData['url_logo'] = media().'/images/uploads/'.$arrData['logo'];
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setGrupo(){
			if($_POST){
				
				if(empty($_POST['txtNombre_grupo']) || empty($_POST['txtRepresentante']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus']) || empty($_POST['txtCorreo']) || empty($_POST['txtTelefono']) || empty($_POST['txtNumero_integrantes']) || empty($_POST['txtUbicacion'])  )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$intId_grupo = intval($_POST['id_Grupo']);
			        //$strGrupo =  strClean($_POST['txtNombre_grupo']);
					$strNombre_grupo=  strClean($_POST['txtNombre_grupo']);
			        $strDescripcion = strClean($_POST['txtDescripcion']);
			        $intStatus = intval(strClean($_POST['listStatus']));
			        $strCorreo = strClean($_POST['txtCorreo']);
			        $intTelefono = intval(strClean($_POST['txtTelefono']));
			        $intNumero_integrantes = intval(strClean($_POST['txtNumero_integrantes']));
			        $strUbicacion = strClean($_POST['txtUbicacion']);
			        $strRepresentante =  strClean($_POST['txtRepresentante']);
			        $intTipoId = intval(strClean($_POST['listComunidad_id']));

					$foto   	= $_FILES['foto'];
								$nombre_foto 	= $foto['name'];
								$type 		 	= $foto['type'];
								$url_temp    	= $foto['tmp_name'];
								$imgLogo 	= 'portada_categoria.png';
								$request_grupo = "";
								if($nombre_foto != ''){
									$imgLogo = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
								}
			

				

					if($intId_grupo == 0)
					{
						//$option = 1;
						// $strPassword =  empty($_POST['txtPassword']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtPassword']);
						$request_user = $this->model->insertGrupo(
																			$strNombre_grupo, 
																			$strDescripcion, 
																			
																			$strCorreo,
																			$intTelefono, 
																			$intNumero_integrantes, 
																			$strUbicacion,
																			$strRepresentante,
																			
																			$imgLogo,
																			$intStatus,
																			$intTipoId );
																			
																			$option = 1;
					}else{
						//$option = 2;
						// $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
						if($nombre_foto == ''){
										if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
											$imgPortada = $_POST['foto_actual'];
										}
									}
						$request_user = $this->model->updateGrupo($strNombre_grupo, 
																			$strDescripcion, 
																			
																			$strCorreo,
																			$intTelefono, 
																			$intNumero_integrantes, 
																			$strUbicacion,
																			$strRepresentante,
																			
																			$imgLogo,
																			$intStatus,
																			$intTipoId );
																			$option = 2;
																			
																			

					}

					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgLogo); }

						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgLogo); }


							if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
													|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
													deleteFile($_POST['foto_actual']);
												}
					
									}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el correo ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

















		// public function setGrupo(){

	
			
		// 	$intId_grupo = intval($_POST['id_Grupo']);
		// 	$strGrupo =  strClean($_POST['txtNombre_grupo']);
		// 	$strDescripcion = strClean($_POST['txtDescripcion']);
		// 	$intStatus = intval($_POST['listStatus']);
		// 	$strCorreo = strClean($_POST['txtCorreo']);
		// 	$intTelefono = intval($_POST['txtTelefono']);
		// 	$intNumero_integrantes = intval($_POST['txtNumero_integrantes']);
			
		// 	$strUbicacion = strClean($_POST['txtUbicacion']);
		// 	$strRepresentante =  strClean($_POST['txtRepresentante']);
		// 	$intTipoId = intval(strClean($_POST['listComunidad_id']));




		// 	        $foto   	= $_FILES['foto'];
		// 			$nombre_foto 	= $foto['name'];
		// 			$type 		 	= $foto['type'];
		// 			$url_temp    	= $foto['tmp_name'];
		// 			$imgLogo 	= 'portada_categoria.png';
		// 			$request_grupo = "";
		// 			if($nombre_foto != ''){
		// 				$imgLogo = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
		// 			}






		// 	if($intId_grupo == 0)
		// 	{
		// 		//Crear
		// 		$request_grupo = $this->model->insertGrupo($strGrupo, $strDescripcion,$intStatus,
		// 		$strCorreo, $intTelefono, $intNumero_integrantes,$strUbicacion,$strRepresentante,$intTipoId, $imgLogo);
		// 		$option = 1;
		// 	}else{
		// 		//Actualizar
		// 		if($nombre_foto == ''){
		// 			if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
		// 				$imgPortada = $_POST['foto_actual'];
		// 			}
		// 		}
		// 		$request_grupo = $this->model->updateGrupo($intId_grupo, $strGrupo, $strDescripcion, $intStatus,$strCorreo, $intTelefono, $intNumero_integrantes,$strUbicacion ,$strRepresentante,$intTipoId,$imgLogo );
		// 		$option = 2;
		// 	}

		// 	if($request_grupo > 0 )
		// 	{
		// 		if($option == 1)
		// 		{
		// 			$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
		// 			if($nombre_foto != ''){ uploadImage($foto,$imgLogo); }


		// 		}else{
		// 			$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
		// 			if($nombre_foto != ''){ uploadImage($foto,$imgLogo); }

					
		// 			if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
		// 						|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
		// 						deleteFile($_POST['foto_actual']);
		// 					}

		// 		}
		// 	}else if($request_grupo == 'exist'){
				
		// 		$arrResponse = array('status' => false, 'msg' => '¡Atención! El Grupo ya existe.');
		// 	}else{
		// 		$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		// 	}
		// 	echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		// 	die();
		// }

		public function delGrupo()
		{
			


			if($_POST){
				$intId_grupo = intval($_POST['id_grupo']);
				$requestDelete = $this->model->deleteGrupo($intId_grupo);
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