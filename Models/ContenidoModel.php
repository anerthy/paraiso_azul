<?php

class ContenidoModel extends Mysql
{

    public $intid_contenido;
    public $strTitulo;
    public $strContenido;
    public $strModulo;


    public function __construct()
    {
        parent::__construct();
    }

    public function selectContenidos()
    {
        $sql = "SELECT * FROM tbl_contenido_pagina";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectContenido(int $id_contenido)
    {
        $this->intid_contenido = $id_contenido;
        $sql = "SELECT * FROM tbl_contenido_pagina WHERE cont_id_contenido = $this->intid_contenido";
        $request = $this->select($sql);
        return $request;
    }

    public function insertContenido(string $titulo, string $contenido, string $modulo)
    {

        $return = "";
        $this->strTitulo = $titulo;
        $this->strContenido = $contenido;
        $this->strModulo = $modulo;

        $sql = "SELECT * FROM tbl_contenido_pagina WHERE titulo = '{$this->strTitulo}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO tbl_contenido_pagina(cont_titulo,cont_contenido,cont_modulo) VALUES(?,?,?)";
            $arrData = array($this->strTitulo, $this->strContenido, $this->strModulo);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateContenido(int $id_contenido, string $titulo, string $contenido, string $modulo)
    {
        $this->intid_contenido = $id_contenido;
        $this->strTitulo = $titulo;
        $this->strContenido = $contenido;
        $this->strModulo = $modulo;


        $sql = "SELECT * FROM tbl_contenido_pagina WHERE cont_titulo = '$this->strTitulo' AND cont_id_contenido != $this->intid_contenido";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE tbl_contenido_pagina SET cont_titulo = ?, cont_contenido = ?,cont_modulo = ? WHERE cont_id_contenido = $this->intid_contenido ";
            $arrData = array($this->strTitulo, $this->strContenido, $this->strModulo);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function deleteContenido(int $id_contenido)
    {
        $this->intid_contenido = $id_contenido;
        $sql = "DELETE from tbl_contenido_pagina WHERE cont_id_contenido = $this->intid_contenido";
        $arrData = array(0);
        $request = $this->delete($sql, $arrData);
        return $request;
        die();
    }
}
