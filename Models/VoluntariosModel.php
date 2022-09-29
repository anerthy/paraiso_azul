<?php 

	class VoluntariosModel extends Mysql
	{
		
        public   $intId_voluntario;
        public   $strNombre_vol;
        public   $strApellido1;
        public   $strApellido2; 
        public   $strCedula;
        public   $strCorreo; 
        public   $strTelefono; 
        public   $strFecha_nacimiento;
        public   $strGenero;
        public   $strLugar_residencia;
        public   $intStatus;
		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectVoluntarios()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM voluntario";
			$request = $this->select_all($sql);
			return $request;
		}

	

		public function selectVoluntario(int $id_voluntario)
		{

			//BUSCAR GRUPO
			$this->intId_voluntario = $id_voluntario;
			$sql = "SELECT * FROM voluntario_organizado WHERE id_voluntario = $this->intId_voluntario";
			$request = $this->select($sql);
			return $request;

		}

		public function insertVoluntario( string $nombre_vol, string $apellido1,  string $apellido2,
		 string $cedula, string $correo ,string $telefono, string $fecha_nacimiento,string $genero,string $lugar_residencia ,int $status){

			$return = "";
		
			$this->strNombre_vol = $nombre_vol;
			$this->strApellido1 = $apellido1;		
			$this->strApellido2 = $apellido2;
			$this->strCedula = $cedula;
			$this->strCorreo = $correo;
			$this->strTelefono = $telefono;
			$this->strFecha_nacimiento = $fecha_nacimiento;
			$this->strGenero = $genero;
			$this->strLugar_residencia = $lugar_residencia;
			$this->intStatus = $status;
			$return = 0;
			


			$sql = "SELECT * FROM voluntario WHERE nombre_vol = '{$this->strNombre_vol}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO voluntario(nombre_vol,apellido1,apellido2,cedula,correo,telefono,fecha_nacimiento,lugar_residencia,status) VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre_vol, $this->strApellido1,$this->strApellido2,$this->strCedula,$this->strCorreo,$this->strTelefono,$this->strFecha_nacimiento,$this->strGenero, $this->strLugar_residencia,$this->intStatus);
	        
					$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	




        //////////////////////////////////////
		public function updateVoluntario(int $id_voluntario,string $nombre_voluntario,string $descripcion, string $correo, int $telefono, int $numero_integrantes,string $ubicacion,string $representante, string $logo,int $status,int $tipoid ){
			$this->intId_Voluntario = $id_voluntario;
			$this->strNombre_voluntario = $nombre_voluntario;	
			$this->strDescripcion = $descripcion;
			
			$this->strCorreo = $correo;
			$this->intTelefono = $telefono;
			$this->intNumero_integrantes = $numero_integrantes;
			$this->strUbicacion = $ubicacion;
			$this->strRepresentante = $representante;
			$this->strLogo = $logo;
			$this->intStatus = $status;
			$this->intTipovoluntario = $tipoid;
	
			


			$sql = "SELECT * FROM voluntario_organizado WHERE nombre_voluntario =  '$this->strNombre_voluntario' AND id_voluntario != $this->intId_Voluntario";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE voluntario_organizado SET nombre_voluntario = ?, descripcion = ?, status = ?,correo = ?,  telefono = ?, numero_integrantes = ?, ubicacion= ?, representante= ?, comunidad_id = ?,logo = ?WHERE id_voluntario = $this->intId_Voluntario ";
				$arrData = array($this->strNombre_voluntario,$this->strDescripcion, $this->intStatus,$this->strCorreo, $this->intTelefono, $this->intNumero_integrantes,$this->strUbicacion,$this->strRepresentante, $this->intTipovoluntario,$this->strLogo);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteVoluntario(int $id_voluntario)
		{					
			$this->intId_Voluntario = $id_voluntario;
			$sql = "DELETE from voluntario_organizado WHERE id_voluntario = $this->intId_Voluntario";
			//$sql = "UPDATE voluntario_organizado SET status = ? WHERE id_voluntario = $this->intId_Voluntario";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 