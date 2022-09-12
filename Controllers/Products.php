<?php 

	class Products extends Controllers{
		public function __construct()
		{
			session_start();
			session_regenerate_id(true);
			parent::__construct();
		}

		public function Products()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Productos";
			$data['page_name'] = "product_usuario";
			$data['page_title'] = "Productos";
			$data['page_functions_js'] = "functions_products.js";
			$this->views->getView($this,"products",$data);
		}

		public function getProducts()
		{

	
			$arrData = $this->model->selectProducts();


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
				
				<button class="btn btn-primary btn-sm btnEditProduct" onClick="fntEditProduct('.$arrData[$i]['idproduct'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelProduct" onClick="fntDelProduct('.$arrData[$i]['idproduct'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idproduct'].')" title="Ver product"><i class="far fa-eye"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getSelectProducts()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectProducts();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idproduct'].'">'.$arrData[$i]['nombreproduct'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

		public function getProduct(int $idproduct)
		{
			$intIdproduct = intval(strClean($idproduct));
			if($intIdproduct > 0)
			{
				$arrData = $this->model->selectProduct($intIdproduct);
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

		public function setProduct(){
			
			$intIdproduct = intval($_POST['idProduct']);
			$strProduct =  strClean($_POST['txtNombre']);
			$strDescripcion = strClean($_POST['txtDescripcion']);
            $intPrecio = intval($_POST['txtPrecio']);
			$intStatus = intval($_POST['listStatus']);
			$intTelefono = intval($_POST['txtTelefono']);
			$strProveedor = strClean($_POST['txtProveedor']);



			
			$foto   	= $_FILES['foto'];
			$nombre_foto 	= $foto['name'];
			$type 		 	= $foto['type'];
			$url_temp    	= $foto['tmp_name'];
			$imgPortada 	= 'portada_categoria.png';
			$request_grupo = "";
			if($nombre_foto != ''){
				$imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
			}








	
			if($intIdproduct == 0)
			{
				//Crear
				$request_product = $this->model->insertProduct($strProduct, $strDescripcion, $intPrecio, $intStatus, $intTelefono,$strProveedor,$imgPortada
				);
				$option = 1;
			}else{
				//Actualizar
				if($nombre_foto == ''){
					if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
						$imgPortada = $_POST['foto_actual'];
					}
				}
				$request_product = $this->model->updateProduct($intIdproduct,$strProduct, $strDescripcion, $intPrecio, $intStatus, $intTelefono,$strProveedor,$imgPortada
            );
				$option = 2;
			}

			if($request_product > 0 )
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
			}else if($request_product == 'exist'){
				
				$arrResponse = array('status' => false, 'msg' => '¡Atención! El Product ya existe.');
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function delProduct()
		{

			if($_POST){
				$intIdproduct = intval($_POST['idproduct']);
				$requestDelete = $this->model->deleteProduct($intIdproduct);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el product');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el product.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();

		}

	}
 ?>