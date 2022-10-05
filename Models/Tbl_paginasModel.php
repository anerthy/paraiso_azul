<?php

class Tbl_paginasModel extends Mysql
{
	public $intPag_id;
	public $strTbl_pagina;
	public $strPag_Titulo;
    public $strPag_Contenido;


	public function __construct()
	{
		parent::__construct();
	}

	public function selectTbl_paginas()
	{
		//EXTRAE COMUNIDADES NOC
		$sql = "SELECT * FROM tbl_pagina";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectTbl_pagina(int $pag_id)
	{
		//BUSCAR COMUNIDAD
		$this->intPag_id = $pag_id;
		$sql = "SELECT * FROM tbl_pagina WHERE pag_id = $this->intPag_id";
		$request = $this->select($sql);
		return $request;
	}

	public function insertTbl_pagina(string $tbl_pagina, string $pag_titulo, string $pag_contenido)
	{

		$return = "";
		$this->strTbl_pagina = $tbl_pagina;
		$this->strPag_Titulo = $pag_titulo;
		$this->strPag_Contenido = $pag_contenido;
	
		$sql = "SELECT * FROM tbl_pagina WHERE tbl_pagina = '{$this->strTbl_pagina}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO tbl_pagina(pag_titulo,pag_contenido) VALUES(?,?)";
			$arrData = array($this->strTbl_pagina,$this->strPag_Titulo, $this->strPag_Contenido);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateTbl_pagina(int $pag_id, string $tbl_pagina, string $pag_titulo, string $pag_contenido)
	{
		$this->intPag_id = $pag_id;
		$this->strTbl_Pagina = $tbl_pagina;
		$this->strPag_Titulo = $pag_titulo;
		$this->strPag_Contenido = $pag_contenido;
		

		$sql = "SELECT * FROM tbl_pagina WHERE tbl_pagina = '$this->strTbl_Pagina' AND pag_id != $this->intPag_id";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE tbl_pagina SET pag_titulo = ?, pag_contenido = ? WHERE pag_id = $this->intPag_id ";
			$arrData = array($this->strTbl_Pagina, $this->strPag_Titulo,$this->strPag_Contenido);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteTbl_Pagina(int $pag_id)
	{
		$this->intPag_id = $pag_id;
		$sql = "DELETE from tbl_pagina  WHERE pag_id = $this->intPag_id"; //$sql = "UPDATE comunidad SET status = ? WHERE id_comunidad = $this->intId_comunidad ";
		$arrData = array(0);
		$request = $this->delete($sql, $arrData);
		return $request;
		die();
	}
}
