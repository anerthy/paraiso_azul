<?php

class UsuariosModel extends Mysql
{
	private $intIdUsuario;
	private $strNombre;
	private $strCorreo;
	private $strContraseña;
	private $intRolId;
	private $intEstado;

	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsuario(string $nombre, string $correo, string $contraseña, int $rol_id, int $estado)
	{

		$this->strNombre = $nombre;
		$this->strCorreo = $correo;
		$this->strContraseña = $contraseña;
		$this->intRolId = $rol_id;
		$this->intEstado = $estado;
		$return = 0;

		$sql = "SELECT * FROM usuario WHERE 
					correo = '{$this->strCorreo}' or nombre = '{$this->strNombre}' "; //* REVISAR
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO usuario (nombre,correo,contraseña,rol_id,estado) 
								  VALUES(?,?,?,?,?)";
			$arrData = array(
				$this->strNombre,
				$this->strCorreo,
				$this->strContraseña,
				$this->intRol_Id,
				$this->intEstado
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
		$sql = "SELECT u.id_usuario,u.nombre,u.correo,u.contraseña,r.nombre,u.estado 
					FROM usuario u 
					INNER JOIN rol r
					ON u.rol_id = r.id_rol
					WHERE p.estado != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectUsuario(int $id_usuario)
	{
		$this->intIdUsuario = $id_usuario;
		$sql = "SELECT u.id_usuario,u.nombre,u.correo,u.contraseña,u.rol_id,r.nombre,u.estado 
					FROM usuario u
					INNER JOIN rol r
					ON u.rol_id = r.id_rol
					WHERE u.id_usuario = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	public function updateUsuario(int $id_usuario, string $nombre, string $correo, string $contraseña, int $rol_id, int $estado)
	{
		$this->intIdUsuario = $id_usuario;
		$this->strNombre = $nombre;
		$this->strCorreo = $correo;
		$this->strContraseña = $contraseña;
		$this->intRolId = $rol_id;
		$this->intEstado = $estado;

		$sql = "SELECT * FROM usuario WHERE (correo = '{$this->strCorreo}' AND id_usuario != $this->intIdUsuario)
										  OR (nombre = '{$this->strNombre}' AND id_usuario != $this->intIdUsuario) ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			if ($this->strContraseña  != "") {
				$sql = "UPDATE usuario SET nombre=?, correo=?, contraseña=?, rol_id=?, estado=? 
							WHERE id_usuario = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strCorreo,
					$this->strContraseña,
					$this->intRolId,
					$this->intEstado
				);
			} else {
				$sql = "UPDATE usuario SET nombre=?, correo=?, rol_id=?, estado=? 
							WHERE id_usuario = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strCorreo,
					$this->intRolId,
					$this->intEstado
				);
			}
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}
	public function deleteUsuario(int $intIdUsuario)
	{
		$this->intIdUsuario = $intIdUsuario;
		$sql = "UPDATE usuario SET estado = ? WHERE id_usuario = $this->intIdUsuario ";
		$arrData = array(0);
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
