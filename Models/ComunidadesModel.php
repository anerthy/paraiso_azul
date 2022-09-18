<?php 

	class ComunidadesModel extends Mysql
	{
		public $intId_comunidad;
		public $strComunidad;
		public $strDescripcion;
		public $strUbicacion;
		//public $intStatus;
		public $strImagen;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectComunidades()
		{
			//EXTRAE COMUNIDADES NOC
			$sql = "SELECT * FROM comunidad WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectComunidad(int $id_comunidad)
		{
			//BUSCAR COMUNIDAD
			$this->intId_comunidad = $id_comunidad;
			$sql = "SELECT * FROM comunidad WHERE id_comunidad = $this->intId_comunidad";
			$request = $this->select($sql);
			return $request;
		}

		public function insertComunidad(string $comunidad, string $descripcion,string $ubicacion/*,int $status*/,string $imagen){

			$return = "";
			$this->strComunidad = $comunidad;
            $this->strDescripcion = $descripcion;
            $this->strUbicacion = $ubicacion;
			//$this->intStatus = $status;
			$this->strImagen = $imagen;


	
            
			


			$sql = "SELECT * FROM comunidad WHERE nombre = '{$this->strComunidad}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO comunidad(nombre,descripcion,ubicacion/*,status*/, imagen) VALUES(?,?,?/*,?*/,?)";
			$arrData = array($this->strComunidad, $this->strDescripcion, $this->strUbicacion/*,$this->intStatus*/,$this->strImagen);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	
        
		public function updateComunidad(int $id_comunidad, string $comunidad, string $descripcion,string $ubicacion/*,int $status*/,string $imagen){
			$this->intId_comunidad = $id_comunidad;
			$this->strComunidad = $comunidad;
			$this->strDescripcion = $descripcion;
			$this->strUbicacion = $ubicacion;
			//$this->intStatus = $status;
			$this->strImagen = $imagen;

			$sql = "SELECT * FROM comunidad WHERE nombre = '$this->strComunidad' AND id_comunidad != $this->intId_comunidad";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE comunidad SET nombre = ?, descripcion = ?, ubicacion = ?/*,status = ?*/,imagen = ?WHERE id_comunidad = $this->intId_comunidad ";
			$arrData = array($this->strComunidad, $this->strDescripcion, $this->strUbicacion/*, $this->intStatus*/,$this->strImagen);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteComunidad(int $id_comunidad)
		{
			
			// $this->intId_comunidad = $id_comunidad;
			// $sql = "SELECT * FROM comunidad WHERE id_comunidad = $this->intId_comunidad";
			// $request = $this->select_all($sql);
			// if(empty($request))
			// {
			// 	$sql = "UPDATE comunidad SET status = ? WHERE id_comunidad = $this->intId_comunidad ";
			// 	$arrData = array(0);
			// 	$request = $this->update($sql,$arrData);
			// 	if($request)
			// 	{
			// 		$request = 'ok';	
			// 	}else{
			// 		$request = 'error';
			// 	}
			// }else{
			// 	$request = 'exist';
			// }
			// return $request;






			$this->intId_comunidad = $id_comunidad;
			$sql = "UPDATE comunidad SET status = ? WHERE id_comunidad = $this->intId_comunidad ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 