<?php 

	class TransportesModel extends Mysql
	{
		public $intId_transporte;
		public $strTransporte;
		public $strDescripcion;
		public $strClase;
		public $strTipo;
		public $strDisponibilidad;
		public $intPrecio;
        public $strTelefono;
        public $intStatus;
		public $strImagen;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectTransportes()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM transporte WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTransporte(int $id_transporte)
		{
			//BUSCAR GRUPO
			$this->intId_transporte = $id_transporte;
			$sql = "SELECT * FROM transporte WHERE id_transporte = $this->intId_transporte";
			$request = $this->select($sql);
			return $request;
		}

		public function insertTransporte(string $transporte, string $descripcion,string $clase, string $tipo, string $disponibilidad, int $precio,string $telefono,int $status, string $imagen){

			$return = "";
			$this->strTransporte = $transporte;
			$this->strDescripcion = $descripcion;
			$this->strClase = $clase;
			$this->strTipo = $tipo;
			$this->strDisponibilidad = $disponibilidad;
			$this->intPrecio = $precio;
            $this->intTelefono = $telefono;
            $this->intStatus = $status;
			$this->strImagen = $imagen;
			


			$sql = "SELECT * FROM transporte WHERE nombre_trans = '{$this->strTransporte}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO transporte(nombre_trans,descripcion,clase,tipo,disponibilidad,precio,telefono,status,imagen) VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strTransporte, $this->strDescripcion, $this->strClase,$this->strTipo,$this->strDisponibilidad,$this->intPrecio,$this->strTelefono,$this->intStatus,$this->strImagen);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateTransporte(int $id_transporte, string $transporte, string $descripcion, string $clase, string $tipo, string $disponibilidad, int $precio,string $telefono,int $status, string $imagen ){
			$this->intId_transporte= $id_transporte;
			$this->strTransporte = $transporte;
			$this->strDescripcion = $descripcion;
			$this->strClase = $clase;
			$this->strTipo = $tipo;
			$this->strDisponibilidad = $disponibilidad;
			$this->intPrecio = $precio;
            $this->strTelefono = $telefono;
            $this->intStatus = $status;
			$this->strImagen = $imagen;
			

			$sql = "SELECT * FROM transporte WHERE nombre_trans = '$this->strTransporte' AND id_transporte != $this->intId_transporte";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE transporte SET nombre_trans = ?, descripcion = ?, clase = ?, tipo = ?,  disponibilidad = ?, precio = ?, telefono= ?, status= ?,imagen = ?WHERE id_transporte = $this->intId_transporte ";
				$arrData = array($this->strTransporte, $this->strDescripcion, $this->strClase,$this->strTipo, $this->strDisponibilidad, $this->intPrecio,$this->strTelefono, $this->strImagen);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteTransporte(int $id_transporte)
		{
			
			
			$this->intId_Transporte = $id_transporte;
			$sql = "UPDATE transporte SET status = ? WHERE id_transporte = $this->intId_Transporte ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 