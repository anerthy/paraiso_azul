<?php 

	class GruposModel extends Mysql
	{
		public $intIdgrupo;
		public $strGrupo;
		public $strDescripcion;
		public $intStatus;
		public $strCorreo;
		public $intTelefono;
		public $intIntegrantes;
		public $strUbicacion;
		public $strPortada;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectGrupos()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM grupo WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectGrupo(int $idgrupo)
		{
			//BUSCAR GRUPO
			$this->intIdgrupo = $idgrupo;
			$sql = "SELECT * FROM grupo WHERE idgrupo = $this->intIdgrupo";
			$request = $this->select($sql);
			return $request;
		}

		public function insertGrupo(string $grupo, string $descripcion, int $status, string $correo, int $telefono, int $integrantes,string $ubicacion, string $portada){

			$return = "";
			$this->strGrupo = $grupo;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intIntegrantes = $integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strPortada = $portada;
			


			$sql = "SELECT * FROM grupo WHERE nombre = '{$this->strGrupo}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO grupo(nombre,descripcion,status,correo,telefono,integrantes,ubicacion,portada) VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strGrupo, $this->strDescripcion, $this->intStatus,$this->strCorreo,$this->intTelefono,$this->intIntegrantes,$this->strUbicacion,$this->strPortada);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateGrupo(int $idgrupo, string $grupo, string $descripcion, int $status, string $correo, int $telefono, int $integrantes,string $ubicacion, string $portada ){
			$this->intIdgrupo = $idgrupo;
			$this->strGrupo = $grupo;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intIntegrantes = $integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strPortada = $portada;
			

			$sql = "SELECT * FROM grupo WHERE nombre = '$this->strGrupo' AND idgrupo != $this->intIdgrupo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE grupo SET nombre = ?, descripcion = ?, status = ?,correo = ?,  telefono = ?, integrantes = ?, ubicacion= ?, portada = ?WHERE idgrupo = $this->intIdgrupo ";
				$arrData = array($this->strGrupo, $this->strDescripcion, $this->intStatus,$this->strCorreo, $this->intTelefono, $this->intIntegrantes,$this->strUbicacion, $this->strPortada);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteGrupo(int $idgrupo)
		{
			
			
			$this->intIdGrupo = $idgrupo;
			$sql = "UPDATE grupo SET status = ? WHERE idgrupo = $this->intIdGrupo ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 