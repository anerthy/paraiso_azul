<?php
require_once("Libraries/Core/Mysql.php");
trait THospedaje
{
    public $con;

    public function getHospedajesT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_hospedaje,nombre_hosp,descripcion,tipo,direccion,telefono,precio,imagen FROM view_hospedaje;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
