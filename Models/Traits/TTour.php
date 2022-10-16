<?php
require_once("Libraries/Core/Mysql.php");
trait TTour
{
    public $con;

    public function getToursT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_tour,nombre_tour,descripcion,actividad,alimentacion,hospedaje,transporte,lugar,disponibilidad,hora_inicio,duracion,cupo_minimo,telefono,precio,imagen FROM view_tour;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
