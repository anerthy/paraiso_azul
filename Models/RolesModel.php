<?php

class RolesModel extends Mysql
{
	public $intIdrol;
	public $strRol;
	public $strDescripcion;
	public $intStatus;

	public function __construct()
	{
		parent::__construct();
	}

	public function selectRoles()
	{
		//EXTRAE ROLES
		$sql = "SELECT * FROM rol";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectRol(int $idrol)
	{
		//BUSCAR ROLE
		$this->intIdrol = $idrol;
		$sql = "SELECT * FROM rol WHERE id_rol = $this->intIdrol";
		$request = $this->select($sql);
		return $request;
	}

	public function insertRol(string $rol, string $descripcion, int $status)
	{

		$return = "";
		$this->strRol = $rol;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $status;

		$sql = "SELECT * FROM rol WHERE nombre_rol = '{$this->strRol}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO rol(nombre_rol,descripcion,status) VALUES(?,?,?)";
			$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
	{
		$this->intIdrol = $idrol;
		$this->strRol = $rol;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $status;

		$sql = "SELECT * FROM rol WHERE nombre_rol = '$this->strRol' AND id_rol != $this->intIdrol";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE rol SET nombre_rol = ?, descripcion = ?, status = ? WHERE id_rol = $this->intIdrol ";
			$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteRol(int $idrol)
	{
		$this->intIdrol = $idrol;
		$sql = "SELECT * FROM usuario WHERE rol_id = $this->intIdrol";
		$request = $this->select_all($sql);
		if (empty($request)) {
			$sql = "DELETE from rol WHERE id_rol = $this->intIdrol ";
			$arrData = array($this->intIdrol);
			$request = $this->delete($sql, $arrData);
			if ($request) {
				$request = 'ok';
			} else {
				$request = 'error';
			}
		} else {
			$request = 'exist';
		}
		return $request;
	}
}
