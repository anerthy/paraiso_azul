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

	// public function getUserEmail(string $strEmail){
	// 	$this->strUsuario = $strEmail;
	// 	$sql = "SELECT idpersona,nombres,apellidos,status FROM persona WHERE 
	// 			email_user = '$this->strUsuario' and  
	// 			status = 1 ";
	// 	$request = $this->select($sql);
	// 	return $request;
	// }

	// public function setTokenUser(int $idpersona, string $token){
	// 	$this->intIdUsuario = $idpersona;
	// 	$this->strToken = $token;
	// 	$sql = "UPDATE persona SET token = ? WHERE idpersona = $this->intIdUsuario ";
	// 	$arrData = array($this->strToken);
	// 	$request = $this->update($sql,$arrData);
	// 	return $request;
	// }

	// public function getUsuario(string $email, string $token){
	// 	$this->strUsuario = $email;
	// 	$this->strToken = $token;
	// 	$sql = "SELECT idpersona FROM persona WHERE 
	// 			email_user = '$this->strUsuario' and 
	// 			token = '$this->strToken' and 					
	// 			status = 1 ";
	// 	$request = $this->select($sql);
	// 	return $request;
	// }

	// public function insertPassword(int $idPersona, string $password){
	// 	$this->intIdUsuario = $idPersona;
	// 	$this->strPassword = $password;
	// 	$sql = "UPDATE persona SET password = ?, token = ? WHERE idpersona = $this->intIdUsuario ";
	// 	$arrData = array($this->strPassword,"");
	// 	$request = $this->update($sql,$arrData);
	// 	return $request;
	// }
}
