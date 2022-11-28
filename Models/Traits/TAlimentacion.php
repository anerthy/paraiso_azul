<?php
require_once("Libraries/Core/Mysql.php");
trait TAlimentacion
{
    public $con;

    public function getAlimentacionT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_alimentacion,nombre_alim,descripcion,direccion,concat(date_format(hora_apertura,'De %h:%m %p '),date_format(hora_cierre,'a %h:%m %p')) AS horario,telefono,imagen FROM alimentacion where status = 1;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['imagen'] = BASE_URL . '/Assets/images/uploads/alimentacion/' . $request[$i]['imagen'];
            }
        }
        return $request;
    }
}
