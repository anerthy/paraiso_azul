<?php

class GaleriasModel extends Mysql
{
	public $intGal_Id_Galeria;
	public $strGal_Descripcion;
	public $strGal_Ubicacion;
	public $strgal_imagen;


	public function __construct()
	{
		parent::__construct();
	}

	public function selectGalerias()
	{
		//EXTRAE COMUNIDADES NOC
		$sql = "SELECT * FROM tbl_galeria";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectGaleria(int $gal_id_galeria)
	{
		//BUSCAR COMUNIDAD
		$this->intGal_Id_Galeria = $gal_id_galeria;
		$sql = "SELECT * FROM tbl_galeria WHERE gal_id_galeria = $this->intGal_Id_Galeria";
		$request = $this->select($sql);
		return $request;
	}

	public function insertGaleria( string $gal_descripcion, string $gal_ubicacion, string $gal_imagen)
	{

		$return = "";
	
		$this->strGal_Descripcion = $gal_descripcion;
		$this->strGal_Ubicacion = $gal_ubicacion;
		$this->strgal_imagen = $gal_imagen;

		$sql = "SELECT * FROM tbl_galeria WHERE gal_descripcion = '{$this->strGal_Descripcion}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO tbl_galeria(gal_descripcion,gal_ubicacion,gal_imagen) VALUES(?,?,?)";
			$arrData = array($this->strGal_Descripcion, $this->strGal_Ubicacion, $this->strgal_imagen);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateGaleria(int $gal_id_galeria,string $gal_descripcion, string $gal_ubicacion, string $gal_imagen)
	{
		$this->intGal_Id_Galeria = $gal_id_galeria;
		$this->strGal_Descripcion = $gal_descripcion;
		$this->strGal_Ubicacion = $gal_ubicacion;
		$this->strgal_imagen = $gal_imagen;


		$sql = "SELECT * FROM tbl_galeria WHERE gal_descripcion = '$this->strGal_Descripcion' AND gal_id_galeria != $this->intGal_Id_Galeria";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE tbl_galeria SET  gal_descripcion = ?, gal_ubicacion = ?,gal_imagen = ?WHERE gal_id_galeria = $this->intGal_Id_Galeria ";
			$arrData = array( $this->strGal_Descripcion, $this->strGal_Ubicacion, $this->strgal_imagen);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteGaleria(int $gal_id_galeria)
	{
		$this->intGal_Id_Galeria = $gal_id_galeria;
		$sql = "DELETE from tbl_galeria  WHERE gal_id_galeria = $this->intGal_Id_Galeria"; //$sql = "UPDATE galeria SET status = ? WHERE id_galeria = $this->intId_galeria ";
		$arrData = array(0);
		$request = $this->delete($sql, $arrData);
		return $request;
		die();
	}
}
