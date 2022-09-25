<?php

class PermisosModel extends Mysql
{
	public $intIdpermiso;
	public $intRolid;
	public $intModuloid;
	public $ver; //r
	public $agregar; //w
	public $actualizar; //u
	public $eliminar; //d

	public function __construct()
	{
		parent::__construct();
	}

	public function selectModulos()
	{
		$sql = "SELECT * FROM modulo WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectPermisosRol(int $idrol)
	{
		$this->intRolid = $idrol;
		$sql = "SELECT * FROM permisos WHERE rol_id = $this->intRolid";
		$request = $this->select_all($sql);
		return $request;
	}

	public function deletePermisos(int $idrol)
	{
		$this->intRolid = $idrol;
		$sql = "DELETE FROM permisos WHERE rol_id = $this->intRolid";
		$request = $this->delete($sql);
		return $request;
	}

	public function insertPermisos(int $idrol, int $idmodulo, int $ver, int $agregar, int $actualizar, int $eliminar)
	{
		$this->intRolid = $idrol;
		$this->intModuloid = $idmodulo;
		$this->ver = $ver;
		$this->agregar = $agregar;
		$this->actualizar = $actualizar;
		$this->eliminar = $eliminar;
		$query_insert  = "INSERT INTO permisos(rol_id,modulo_id,ver,agregar,actualizar,eliminar) VALUES(?,?,?,?,?,?)";
		$arrData = array($this->intRolid, $this->intModuloid, $this->ver, $this->agregar, $this->actualizar, $this->eliminar);
		$request_insert = $this->insert($query_insert, $arrData);
		return $request_insert;
	}
}
