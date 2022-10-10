<?php 

	class ToursModel extends Mysql
	{
		

        public $intId_tour;	
        public $strNombre_tour;
        public $strDescripcion;
        public $strServicio;
        public $strActividad;
        public $strAlimentacion;
        public $strHospedaje;
        public $strTransporte;
        public $strLugar;
        public $strDisponibilidad;
        public $strHora_inicio;
        public $strDuracion;
        public $strCupo_minimo;
        public $strTelefono;
        public $intPrecio;
        public $intStatus;
        public $strImagen; 

		

		public function __construct()
		{
			parent::__construct();
		}

		public function selectTours()
		{
			//EXTRAE GRUPOS
			$sql = "SELECT * FROM tour";
			$request = $this->select_all($sql);
			return $request;
		}

	
		public function selectTour(int $id_tour)
		{


			//BUSCAR GRUPO
			$this->intId_tour = $id_tour;
			$sql = "SELECT * FROM tour WHERE id_tour = $this->intId_tour";
			$request = $this->select($sql);
			return $request;
		}

		public function insertTour(
         string $nombre_tour, string $descripcion, string $servicio, string $actividad, string $alimentacion, string $hospedaje,
         string $transporte, string $lugar, string $disponibilidad, string $hora_inicio, string $duracion,string $cupo_minimo, string $telefono,
         string $precio, int $status,string $imagen 
         ){

			$return = "";

			$this->strNombre_tour = $nombre_tour;
			$this->strDescripcion = $descripcion;	
            $this->strServicio = $servicio;
            $this->strActividad =  $actividad;
            $this->strAlimentacion = $alimentacion;
            $this->strHospedaje = $hospedaje;
            $this->strTransporte = $transporte;
            $this->strLugar = $lugar;
            $this->strDisponibilidad = $disponibilidad;
            $this->strHora_inicio = $hora_inicio;
            $this->strDuracion = $duracion;
            $this->strCupo_minimo = $cupo_minimo;
            $this->strTelefono = $telefono;
            $this->intPrecio = $precio;
            $this->intStatus = $status;
            $this->strImagen = $imagen;
            
			$return = 0;
			


			$sql = "SELECT * FROM tour WHERE nombre_tour = '{$this->strNombre_tour}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tour(nombre_tour,descripcion,
                servicio,actividad,alimentacion,hospedaje,transporte,
                lugar,disponibilidad,hora_inicio,duracion,cupo_minimo,telefono,precio,status,imagen)
                
                
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array(
                 $this->strNombre_tour,
                 $this->strDescripcion,
                 $this->strServicio,
                 $this->strActividad,
                 $this->strAlimentacion,
                 $this->strHospedaje,
                 $this->strTransporte,
                 $this->strLugar, 
                 $this->strDisponibilidad,
                 $this->strHora_inicio,
                 $this->strDuracion,
                 $this->strCupo_minimo,
                 $this->strTelefono,
                 $this->intPrecio,
                 $this->intStatus,
                 $this->strImagen



                
                );
	        
					$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateTour(int $id_tour,
        string $nombre_tour, string $descripcion, string $servicio, string $actividad, string $alimentacion, string $hospedaje,
        string $transporte, string $lugar, string $disponibilidad, string $hora_inicio, string $duracion , string $cupo_minimo, string $telefono,
        string $precio, int $status, string $imagen  ){


			$this->intId_Tour = $id_tour;
            $this->strNombre_tour = $nombre_tour;
			$this->strDescripcion = $descripcion;	
            $this->strServicio = $servicio;
            $this->strActividad =  $actividad;
            $this->strAlimentacion = $alimentacion;
            $this->strHospedaje = $hospedaje;
            $this->strTransporte = $transporte;
            $this->strLugar = $lugar;
            $this->strDisponibilidad = $disponibilidad;
            $this->strHora_inicio = $hora_inicio;
            $this->strDuracion = $duracion;
            $this->strCupo_minimo = $cupo_minimo;
            $this->strTelefono = $telefono;
            $this->intPrecio = $precio;
            $this->intStatus = $status;
            $this->strImagen = $imagen;
	
			


			$sql = "SELECT * FROM tour WHERE nombre_tour =  '$this->strNombre_tour' AND id_tour != $this->intId_Tour";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tour SET nombre_tour = ?,
                 descripcion = ?,
                 servicio = ?,
                 actividad = ?,
                 alimentacion = ?,
                 hospedaje = ?,
                 transporte= ?,
                 lugar= ?,
                 disponibilidad = ?,
                 hora_inicio = ?,
                 duracion = ?,
                 cupo_minimo =?,
                 telefono = ?,
                 precio = ?,
                 status = ?,
                 imagen = ?
                  
                        WHERE id_tour = $this->intId_Tour ";
				$arrData = array($this->strNombre_tour,
                $this->strDescripcion,
                $this->strServicio,
                $this->strActividad,
                $this->strAlimentacion,
                $this->strHospedaje,
                $this->strTransporte,
                $this->strLugar, 
                $this->strDisponibilidad,
                $this->strHora_inicio,
                $this->strDuracion,
                $this->strCupo_minimo,
                $this->strTelefono,
                $this->intPrecio,
                $this->intStatus,
                $this->strImagen
            );
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteTour(int $id_tour)
		{					
			$this->intId_Tour = $id_tour;
			$sql = "DELETE from tour WHERE id_tour = $this->intId_Tour";
	
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
			die();
		}
	}
 ?>
 