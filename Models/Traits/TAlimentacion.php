<?php
require_once("Libraries/Core/Mysql.php");
trait TAlimentacion
{
    public $con;

    public function getAlimentacionT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_alimentacion,nombre_alim,descripcion,direccion,horario,telefono,imagen FROM view_alimentacion;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
