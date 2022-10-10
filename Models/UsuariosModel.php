<?php

class UsuariosModel extends Mysql
{
	private $intIdUsuario;
	private $strNombre;
	private $strCorreo;
	private $strContraseña;
	private $intTipoId;
	private $intStatus;

	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsuario(string $nombre, string $correo, string $contraseña, int $tipoid, int $status)
	{

		$this->strNombre = $nombre;
		$this->strCorreo = $correo;
		$this->strContraseña = $contraseña;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;
		$return = 0;

		$sql = "SELECT * FROM usuario WHERE 
					correo = '{$this->strCorreo}' or nombre_usuario = '{$this->strNombre}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO usuario(nombre_usuario,correo,contraseña,rol_id,status) 
								  VALUES(?,?,?,?,?)";
			$arrData = array(
				$this->strNombre,
				$this->strCorreo,
				$this->strContraseña,
				$this->intTipoId,
				$this->intStatus
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function selectUsuarios()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
			$whereAdmin = " where u.id_usuario != 1 ";
		}
		$sql = "SELECT u.id_usuario,u.nombre_usuario,u.correo,u.status,r.id_rol,r.nombre_rol 
					FROM usuario u 
					INNER JOIN rol r
					ON u.rol_id = r.id_rol " . $whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectUsuario(int $id_usuario)
	{
		$this->intIdUsuario = $id_usuario;
		$sql = "SELECT u.id_usuario,u.nombre_usuario,u.correo,r.id_rol,r.nombre_rol,u.status
					FROM usuario u
					INNER JOIN rol r
					ON u.rol_id = r.id_rol
					WHERE u.id_usuario = $this->intIdUsuario ";
		$request = $this->select($sql);
		return $request;
	}

	public function updateUsuario(int $idUsuario, string $nombre, string $correo, string $contraseña, int $tipoid, int $status)
	{

		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nombre;
		$this->strCorreo = $correo;
		$this->strContraseña = $contraseña;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;

		$sql = "SELECT * FROM usuario WHERE (correo = '{$this->strCorreo}' AND id_usuario != $this->intIdUsuario)
										  OR (nombre_usuario = '{$this->strNombre}' AND id_usuario != $this->intIdUsuario) ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			if ($this->strContraseña  != "") {
				$sql = "UPDATE usuario SET nombre_usuario=?, correo=?, contraseña=?, rol_id=?, status=? 
							WHERE id_usuario = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strCorreo,
					$this->strContraseña,
					$this->intTipoId,
					$this->intStatus
				);
			} else {
				$sql = "UPDATE usuario SET nombre_usuario=?, correo=?, rol_id=?, status=? 
							WHERE id_usuario = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strCorreo,
					$this->intTipoId,
					$this->intStatus
				);
			}
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}
	public function deleteUsuario(int $intIdusuario)
	{
		$this->intIdUsuario = $intIdusuario;
		$sql = "DELETE from usuario WHERE id_usuario = $this->intIdUsuario ";
		$arrData = array($this->intIdUsuario);
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
