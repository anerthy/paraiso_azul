<?php 

	class GruposModel extends Mysql
	{
		public $intId_Grupo;
		//public $strGrupo;
		public $strNombre_grupo;
		public $strDescripcion;
		public $intStatus;
		public $strCorreo;
		public $intTelefono;
		public $intNumero_integrantes;
		public $strUbicacion;
		public $strRepresentante;
		public $intTipogrupo;
		public $strLogo;
		

		public function __construct()
		{
			parent::__construct();
		}

		// public function selectGrupos()
		// {
		// 	//EXTRAE GRUPOS
		// 	$sql = "SELECT * FROM grupo_organizado ";
		// 	$request = $this->select_all($sql);
		// 	return $request;
		// }

		public function selectGrupos()
	{
		$sql = "SELECT g.id_grupo,g.nombre_grupo,g.representante,g.descripcion,g.ubicacion,g.correo,g.telefono,g.numero_integrantes,g.logo,g.status,g.comunidad_id,c.nombre_com
					FROM grupo_organizado g
					INNER JOIN comunidad c
					ON g.comunidad_id = c.id_comunidad
					WHERE g.status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}
////// ????/
		public function selectGrupo(int $id_grupo)
		{


			$this->intId_Grupo = $id_grupo;
			$sql = "SELECT g.id_grupo,g.nombre_grupo,g.representante,g.descripcion,g.ubicacion,g.correo,g.telefono,g.numero_integrantes,g.logo,g.status,c.nombre_com,c.id_comunidad
			FROM grupo_organizado g
					INNER JOIN comunidad c
					ON g.comunidad_id = c.id_comunidad
					WHERE g.id_grupo = $this->intId_Grupo";
					
			$request = $this->select($sql);
			return $request;




			// //BUSCAR GRUPO
			// $this->intId_grupo = $id_grupo;
			// $sql = "SELECT * FROM grupo_organizado WHERE id_grupo = $this->intId_grupo";
			// $request = $this->select($sql);
			// return $request;

		}

		public function insertGrupo( string $nombre_grupo, string $descripcion,  string $correo,
		 int $telefono, int $numero_integrantes,string $ubicacion, string $representante,string $logo,int $status,int $tipoid){

			$return = "";
			//$this->strGrupo = $grupo;
			$this->strNombre_grupo = $nombre_grupo;
			$this->strDescripcion = $descripcion;		
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intNumero_integrantes = $numero_integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strRepresentante = $representante;
			$this->strLogo = $logo;
			$this->intStatus = $status;
			$this->intTipogrupo = $tipoid;
			$return = 0;
			


			$sql = "SELECT * FROM grupo_organizado WHERE nombre_grupo = '{$this->strNombre_grupo}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO grupo_organizado(nombre_grupo,descripcion,correo,telefono,numero_integrantes,ubicacion,representante,logo,status,comunidad_id) VALUES(?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre_grupo, $this->strDescripcion,$this->strCorreo,$this->intTelefono,$this->intNumero_integrantes,$this->strUbicacion,$this->strRepresentante,$this->strLogo, $this->intStatus,$this->intTipogrupo);
	        
					$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateGrupo(int $id_grupo,string $nombre_grupo,string $descripcion, string $correo, int $telefono, int $numero_integrantes,string $ubicacion,string $representante, string $logo,int $status,int $tipoid ){
			$this->intId_Grupo = $id_grupo;
			$this->strNombre_grupo = $nombre_grupo;	
			$this->strDescripcion = $descripcion;
			
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intNumero_integrantes = $numero_integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strRepresentante = $representante;
			$this->strLogo = $logo;
			$this->intStatus = $status;
			$this->intTipogrupo = $tipoid;
	
			


			$sql = "SELECT * FROM grupo_organizado WHERE nombre_grupo =  '$this->strNombre_grupo' AND id_grupo != $this->intId_Grupo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE grupo_organizado SET nombre_grupo = ?, descripcion = ?, status = ?,correo = ?,  telefono = ?, numero_integrantes = ?, ubicacion= ?, representante= ?, comunidad_id = ?,logo = ?WHERE id_grupo = $this->intId_Grupo ";
				$arrData = array($this->strNombre_grupo,$this->strDescripcion, $this->intStatus,$this->strCorreo, $this->intTelefono, $this->intNumero_integrantes,$this->strUbicacion,$this->strRepresentante, $this->intTipogrupo,$this->strLogo);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteGrupo(int $id_grupo)
		{					
			$this->intId_Grupo = $id_grupo;
			$sql = "DELETE from grupo_organizado WHERE id_grupo = $this->intId_Grupo";
			//$sql = "UPDATE grupo_organizado SET status = ? WHERE id_grupo = $this->intId_Grupo";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 