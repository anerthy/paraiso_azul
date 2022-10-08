<?php

class LoginModel extends Mysql
{
	private $intIdUsuario;
	private $strUsuario;
	private $strPassword;
	private $strToken;

	public function __construct()
	{
		parent::__construct();
	}

	public function loginUser(string $usuario, string $password)
	{
		$this->strUsuario = $usuario;
		$this->strPassword = $password;
		$sql = "SELECT id_usuario,status FROM usuario WHERE 
					correo = '$this->strUsuario' and 
					contraseña = '$this->strPassword' and 
					status != 0 ";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $iduser)
	{
		$this->intIdUsuario = $iduser;
		//BUSCAR ROLE 
		$sql = "SELECT u.id_usuario,u.nombre_usuario,u.correo,r.id_rol,r.nombre_rol,u.status 
					FROM usuario u
					INNER JOIN rol r
					ON u.rol_id = r.id_rol
					WHERE u.id_usuario = $this->intIdUsuario";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}

	public function getUserEmail(string $strEmail)
	{
		$this->strUsuario = $strEmail;
		$sql = "SELECT id_usuario,nombre_usuario,correo,status FROM usuario WHERE 
				correo = '$this->strUsuario' and  
				status = 1 ";
		$request = $this->select($sql);
		return $request;
	}

	public function setTokenUser(int $id_usuario, string $token)
	{
		$this->intIdUsuario = $id_usuario;
		$this->strToken = $token;
		$sql = "UPDATE usuario SET token = ? WHERE id_usuario = $this->intIdUsuario ";
		$arrData = array($this->strToken);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function getUsuario(string $email, string $token)
	{
		$this->strUsuario = $email;
		$this->strToken = $token;
		$sql = "SELECT id_usuario FROM usuario WHERE 
				correo = '$this->strUsuario' and 
				token = '$this->strToken' and 					
				status = 1 ";
		$request = $this->select($sql);
		return $request;
	}

	public function insertPassword(int $idUsuario, string $password)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strPassword = $password;
		$sql = "UPDATE usuario SET contraseña = ?, token = ? WHERE id_usuario = $this->intIdUsuario ";
		$arrData = array($this->strPassword, "");
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
