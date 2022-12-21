<?php
require_once("Libraries/Core/Mysql.php");
trait TTour
{
    public $con;

    public function getToursT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_tour,nombre_tour,descripcion,actividad,alimentacion,hospedaje,transporte,lugar,disponibilidad,date_format(hora_inicio,'%h:%m %p') AS hora_inicio,date_format(duracion,'%h:%m aprox.') AS duracion,cupo_minimo,telefono,CONCAT('₡',ROUND(precio) ) AS precio,imagen FROM tour where status = 1";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/tours/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
