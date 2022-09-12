<?php 

	class ProductsModel extends Mysql
	{
		public $intIdproduct;
		public $strProduct;
		public $strDescripcion;
        public $Precio;
		public $intStatus;
		public $intTelefono;
		public $strProveedor;
		public $strPortada;


		public function __construct()
		{
			parent::__construct();
		}

		public function selectProducts()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM product WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectProduct(int $idproduct)
		{
			//BUSCAR GRUPO
			$this->intIdproduct = $idproduct;
			$sql = "SELECT * FROM product WHERE idproduct = $this->intIdproduct";
			$request = $this->select($sql);
			return $request;
		}

		public function insertProduct(string $product, string $descripcion, int $precio,int $status,  int $telefono, string $proveedor,string $portada){

			$return = "";
			$this->strProduct = $product;
			$this->strDescripcion = $descripcion;
            $this->intPrecio = $precio;
			$this->intStatus = $status;	
			$this->intTelefono = $telefono;
			$this->strProveedor = $proveedor;
			$this->strPortada = $portada;
			


			$sql = "SELECT * FROM product WHERE nombre = '{$this->strProduct}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO product(nombre,descripcion,precio,status,telefono,proveedor,portada) VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array($this->strProduct, $this->strDescripcion, $this->intPrecio ,$this->intStatus,$this->intTelefono,$this->strProveedor,$this->strPortada);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateProduct(int $idproduct, string $product, string $descripcion,int $precio,int $status, int $telefono,string $proveedor,string $portada){
			$this->intIdproduct = $idproduct;
			$this->strProduct = $product;
			$this->strDescripcion = $descripcion;
            $this->intPrecio = $precio;
			$this->intStatus = $status;
			$this->intTelefono = $telefono;
			$this->strProveedor = $proveedor;
			$this->strPortada = $portada;
		

			$sql = "SELECT * FROM product WHERE nombre = '$this->strProduct' AND idproduct != $this->intIdproduct";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE product SET nombre = ?, descripcion = ?, precio = ?,status = ?,  telefono = ?,proveedor = ?, portada = ? WHERE idproduct = $this->intIdproduct ";
				$arrData = array($this->strProduct, $this->strDescripcion,$this->intPrecio ,$this->intStatus, $this->intTelefono,$this->strProveedor,$this->strPortada);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteProduct(int $idproduct)
		{
			
			$this->intIdProduct = $idproduct;
			$sql = "UPDATE product SET status = ? WHERE idproduct = $this->intIdProduct ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>