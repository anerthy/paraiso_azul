<?php

class HospedajesModel extends Mysql
{
	public $intId_hospedaje;
	public $strHospedaje;
	public $strDescripcion;
	public $strTipo;
	public $strDireccion;
	public $strTelefono;
	public $intPrecio;
	public $intStatus;
	public $strImagen;


	public function __construct()
	{
		parent::__construct();
	}

	public function selectHospedajes()
	{
		//EXTRAE GRUPOS
		$sql = "SELECT * FROM hospedaje WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectHospedaje(int $id_hospedaje)
	{
		//BUSCAR GRUPO
		$this->intId_hospedaje = $id_hospedaje;
		$sql = "SELECT * FROM hospedaje WHERE id_hospedaje = $this->intId_hospedaje";
		$request = $this->select($sql);
		return $request;
	}

	public function insertHospedaje(string $hospedaje, string $descripcion, string $tipo, string $direccion, string $telefono, int $precio, int $status, string $imagen)
	{


		$return = "";
		$this->strHospedaje = $hospedaje;
		$this->strDescripcion = $descripcion;
		$this->strTipo = $tipo;
		$this->strDireccion = $direccion;
		$this->strTelefono = $telefono;
		$this->intPrecio = $precio;
		$this->intStatus = $status;
		$this->strImagen = $imagen;



		$sql = "SELECT * FROM hospedaje WHERE nombre_hosp = '{$this->strHospedaje}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO hospedaje(nombre_hosp,descripcion,tipo,direccion,telefono,precio,status,imagen) VALUES(?,?,?,?,?,?,?,?)";
			$arrData = array($this->strHospedaje, $this->strDescripcion, $this->strTipo, $this->strDireccion, $this->strTelefono, $this->intPrecio, $this->intStatus, $this->strImagen);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateHospedaje(int $id_hospedaje, string $hospedaje, string $descripcion, string $tipo, string $direccion, string $telefono, int $precio, int $status, string $imagen)
	{
		$this->intId_hospedaje = $id_hospedaje;
		$this->strHospedaje = $hospedaje;
		$this->strDescripcion = $descripcion;
		$this->strTipo = $tipo;
		$this->strDireccion = $direccion;
		$this->strTelefono = $telefono;
		$this->intPrecio = $precio;
		$this->intStatus = $status;
		$this->strImagen = $imagen;


		$sql = "SELECT * FROM hospedaje WHERE nombre_hosp = '$this->strHospedaje' AND id_hospedaje != $this->intId_hospedaje";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE hospedaje SET nombre_hosp = ?, descripcion = ?, tipo = ?,direccion = ?,  telefono = ?, precio = ?, status= ?, imagen = ? WHERE id_hospedaje = $this->intId_hospedaje ";
			$arrData = array($this->strHospedaje, $this->strDescripcion, $this->strTipo, $this->strDireccion, $this->strTelefono, $this->intPrecio, $this->intStatus, $this->strImagen);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteHospedaje(int $id_hospedaje)
	{


		$this->intId_hospedaje = $id_hospedaje;
		$sql = "UPDATE hospedaje SET status = ? WHERE id_hospedaje = $this->intId_hospedaje ";
		$arrData = array(0);
		$request = $this->update($sql, $arrData);
		return $request;
		die();
	}
}
