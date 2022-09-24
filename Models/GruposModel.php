<?php 

	class GruposModel extends Mysql
	{
		public $intId_grupo;
		public $strGrupo;
		public $strDescripcion;
		public $intStatus;
		public $strCorreo;
		public $intTelefono;
		public $intNumero_integrantes;
		public $strUbicacion;
		public $strRepresentante;
		public $strLogo;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectGrupos()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM grupo_organizado WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectGrupo(int $id_grupo)
		{
			//BUSCAR GRUPO
			$this->intId_grupo = $id_grupo;
			$sql = "SELECT * FROM grupo_organizado WHERE id_grupo = $this->intId_grupo";
			$request = $this->select($sql);
			return $request;
		}

		public function insertGrupo(string $grupo, string $descripcion, int $status, string $correo, int $telefono, int $numero_integrantes,string $ubicacion, string $representante,string $logo){

			$return = "";
			$this->strGrupo = $grupo;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intNumero_integrantes = $numero_integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strRepresentante = $representante;
			$this->strLogo = $logo;
			


			$sql = "SELECT * FROM grupo_organizado WHERE nombre_grupo = '{$this->strGrupo}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO grupo_organizado(nombre_grupo,descripcion,status,correo,telefono,numero_integrantes,ubicacion,representante,logo) VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strGrupo, $this->strDescripcion, $this->intStatus,$this->strCorreo,$this->intTelefono,$this->intNumero_integrantes,$this->strUbicacion,$this->strRepresentante,$this->strLogo);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateGrupo(int $id_grupo, string $grupo, string $descripcion, int $status, string $correo, int $telefono, int $numero_integrantes,string $ubicacion,string $representante, string $logo ){
			$this->intId_grupo = $id_grupo;
			$this->strGrupo = $grupo;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intNumero_integrantes = $numero_integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strRepresentante = $representante;
			$this->strLogo = $logo;
			

			$sql = "SELECT * FROM grupo_organizado WHERE nombre_grupo = '$this->strGrupo' AND id_grupo != $this->intId_grupo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE grupo_organizado SET nombre_grupo = ?, descripcion = ?, status = ?,correo = ?,  telefono = ?, numero_integrantes = ?, ubicacion= ?, representante= ?, logo = ?WHERE id_grupo = $this->intId_grupo ";
				$arrData = array($this->strGrupo, $this->strDescripcion, $this->intStatus,$this->strCorreo, $this->intTelefono, $this->intNumero_integrantes,$this->strUbicacion,$this->strRepresentante, $this->strLogo);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteGrupo(int $id_grupo)
		{
			
			
			$this->intId_Grupo = $id_grupo;
			$sql = "UPDATE grupo_organizado SET status = ? WHERE id_grupo = $this->intId_Grupo ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 