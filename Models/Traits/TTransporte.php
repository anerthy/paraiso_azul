<?php
require_once("Libraries/Core/Mysql.php");
trait TTransporte
{
    public $con;

    public function getTransportesT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_transporte,nombre_trans,descripcion,clase,tipo,disponibilidad,precio,telefono,imagen FROM view_transporte";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/transporte/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
