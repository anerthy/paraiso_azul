<?php

class AlimentacionModel extends Mysql
{
    public $intId_alimentacion;
    public $strAlimentacion;
    public $strDescripcion;
    public $strDireccion;
    public $strHoraApertura;
    public $strHoraCierre;
    public $strTelefono;
    public $intStatus;
    public $strImagen;


    public function __construct()
    {
        parent::__construct();
    }

    public function selectAlimentaciones()
    {
        //EXTRAE alimentaciones
        $sql = "SELECT * FROM alimentacion WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectAlimentacion(int $id_alimentacion)
    {
        //BUSCAR alimentacion
        $this->intId_alimentacion = $id_alimentacion;
        $sql = "SELECT * FROM alimentacion WHERE id_alimentacion = $this->intId_alimentacion";
        $request = $this->select($sql);
        return $request;
    }

    public function insertAlimentacion(string $alimentacion, string $descripcion, string $direccion, string $hora_apertura, string $hora_cierre, string $telefono, int $status, string $imagen)
    {


        $return = "";
        $this->strAlimentacion = $alimentacion;
        $this->strDescripcion = $descripcion;
        $this->strDireccion = $direccion;
        $this->strHoraApertura = $hora_apertura;
        $this->strHoraCierre = $hora_cierre;
        $this->strTelefono = $telefono;
        $this->intStatus = $status;
        $this->strImagen = $imagen;



        $sql = "SELECT * FROM alimentacion WHERE nombre_alim = '{$this->strAlimentacion}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert  = "INSERT INTO alimentacion(nombre_alim,descripcion, direccion,hora_apertura,hora_cierre,telefono, status,imagen) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array($this->strAlimentacion, $this->strDescripcion, $this->strDireccion, $this->strHoraApertura, $this->strHoraCierre, $this->strTelefono, $this->intStatus, $this->strImagen);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function updateAlimentacion(int $id_alimentacion, string $alimentacion, string $descripcion, string $direccion, string $hora_apertura, string $hora_cierre, string $telefono, int $status, string $imagen)
    {
        $this->intId_alimentacion = $id_alimentacion;
        $this->strAlimentacion = $alimentacion;
        $this->strDescripcion = $descripcion;
        $this->strDireccion = $direccion;
        $this->strHoraApertura = $hora_apertura;
        $this->strHoraCierre = $hora_cierre;
        $this->strTelefono = $telefono;
        $this->intStatus = $status;
        $this->strImagen = $imagen;


        $sql = "SELECT * FROM alimentacion WHERE nombre_alim = '$this->strAlimentacion' AND id_alimentacion != $this->intId_alimentacion";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE alimentacion SET nombre_alim = ?, descripcion = ?,direccion = ?,  hora_apertura = ?,hora_cierre = ?,telefono = ?, status = ?, imagen = ? WHERE id_alimentacion = $this->intId_alimentacion ";

            $arrData = array($this->strAlimentacion, $this->strDescripcion, $this->strDireccion, $this->strHoraApertura, $this->strHoraCierre, $this->strTelefono, $this->intStatus, $this->strImagen);
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function deleteAlimentacion(int $intId_alimentacion)
    {
        $this->intId_alimentacion = $intId_alimentacion;
        $sql = "DELETE FROM alimentacion WHERE id_alimentacion = $this->intId_alimentacion";
        $arrData = array(0);
        $request = $this->delete($sql, $arrData);
        return $request;
    }
}
