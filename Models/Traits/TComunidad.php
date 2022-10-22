<?php
require_once("Libraries/Core/Mysql.php");
trait TComunidad
{
    public $con;

    public function getComunidadesT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_comunidad,nombre_com,descripcion,provincia,canton,distrito,imagen FROM comunidad;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/comunidades/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
