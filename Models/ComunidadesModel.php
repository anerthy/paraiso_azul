<?php

class ComunidadesModel extends Mysql
{
	public $intId_comunidad;
	public $strComunidad;
	public $strDescripcion;
	public $strProvincia;
	public $strCanton;
	public $strDistrito;
	public $strImagen;


	public function __construct()
	{
		parent::__construct();
	}

	public function selectComunidades()
	{
		//EXTRAE COMUNIDADES NOC
		$sql = "SELECT * FROM comunidad";
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

	public function insertComunidad(string $comunidad, string $descripcion, string $provincia, string $canton, string $distrito, string $imagen)
	{

		$return = "";
		$this->strComunidad = $comunidad;
		$this->strDescripcion = $descripcion;
		$this->strProvincia = $provincia;
		$this->strCanton = $canton;
		$this->strDistrito = $distrito;
		$this->strImagen = $imagen;

		$sql = "SELECT * FROM comunidad WHERE nombre_com = '{$this->strComunidad}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO comunidad(nombre_com,descripcion,provincia,canton,distrito, imagen) VALUES(?,?,?,?,?,?)";
			$arrData = array($this->strComunidad, $this->strDescripcion, $this->strProvincia, $this->strCanton, $this->strDistrito, $this->strImagen);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateComunidad(int $id_comunidad, string $comunidad, string $descripcion, string $provincia, string $canton, string $distrito, string $imagen)
	{
		$this->intId_comunidad = $id_comunidad;
		$this->strComunidad = $comunidad;
		$this->strDescripcion = $descripcion;
		$this->strProvincia = $provincia;
		$this->strCanton = $canton;
		$this->strDistrito = $distrito;
		$this->strImagen = $imagen;

		$sql = "SELECT * FROM comunidad WHERE nombre_com = '$this->strComunidad' AND id_comunidad != $this->intId_comunidad";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE comunidad SET nombre_com = ?, descripcion = ?, provincia = ?,canton = ?,distrito = ?,imagen = ?WHERE id_comunidad = $this->intId_comunidad ";
			$arrData = array($this->strComunidad, $this->strDescripcion, $this->strProvincia, $this->strCanton, $this->strDistrito, $this->strImagen);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteComunidad(int $id_comunidad)
	{
		$this->intId_comunidad = $id_comunidad;
		$sql = "DELETE from comunidad  WHERE id_comunidad = $this->intId_comunidad"; //$sql = "UPDATE comunidad SET status = ? WHERE id_comunidad = $this->intId_comunidad ";
		$arrData = array(0);
		$request = $this->delete($sql, $arrData);
		return $request;
		die();
	}
}
