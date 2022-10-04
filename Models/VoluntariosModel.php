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
			$sql = "SELECT * FROM voluntario WHERE id_voluntario = $this->intId_voluntario";
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
				$query_insert  = "INSERT INTO voluntario(nombre_vol,apellido1,apellido2,cedula,correo,telefono,fecha_nacimiento,genero,lugar_residencia,status) VALUES(?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre_vol, $this->strApellido1,$this->strApellido2,$this->strCedula,$this->strCorreo,$this->strTelefono,$this->strFecha_nacimiento,$this->strGenero, $this->strLugar_residencia,$this->intStatus);
	        
					$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	


        /////ESTO NO FUNCIONA TODAVIA   /////   /////   /////   /////
		public function getVoluntarioEmail(string $strEmail){
			$this->strVoluntario = $strEmail;
			$sql = "SELECT id_voluntario,nombre_vol,apellido1,status FROM voluntario WHERE 
					correo = '$this->strVoluntario' and  
					status = 1 ";
			$request = $this->select($sql);
			return $request;
		}


		public function setTokenVoluntario(int $id_voluntario, string $token){
			$this->intId_Voluntario = $id_voluntario;
			$this->strToken = $token;
			$sql = "UPDATE voluntario SET token = ? WHERE id_voluntario = $this->intId_Voluntario ";
			$arrData = array($this->strToken);
			$request = $this->update($sql,$arrData);
			return $request;
		}

   /////   /////   /////   /////   /////   /////   /////   /////

		
        


		public function updateVoluntario(int $id_voluntario,string $nombre_vol,string $apellido1, string $apellido2,
		 string $cedula, string $correo, string $telefono, string $fecha_nacimiento, string $genero, string $lugar_residencia, int $status ){
			
			$this->intId_Voluntario = $id_voluntario;
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


			


			$sql = "SELECT * FROM voluntario WHERE nombre_vol =  '$this->strNombre_vol' AND id_voluntario != $this->intId_Voluntario";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE voluntario SET nombre_vol = ?, apellido1 = ?, apellido2 = ?,cedula = ?,  correo = ?, telefono = ?, fecha_nacimiento= ?, genero= ?, lugar_residencia = ?,status = ?WHERE id_voluntario = $this->intId_Voluntario ";
				$arrData = array($this->strNombre_vol,$this->strApellido1, $this->strApellido2,$this->strCedula, $this->strCorreo, $this->strTelefono,$this->strFecha_nacimiento,$this->strGenero, $this->strLugar_residencia,$this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteVoluntario(int $id_voluntario)
		{					
			$this->intId_Voluntario = $id_voluntario;
			$sql = "DELETE from voluntario WHERE id_voluntario = $this->intId_Voluntario";
			//$sql = "UPDATE voluntario_organizado SET status = ? WHERE id_voluntario = $this->intId_Voluntario";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 