<?php
require_once("Libraries/Core/Mysql.php");
trait TProyecto
{
    public $con;

    public function getProyectoT()
    {
        $this->con = new Mysql();
        $sql = "SELECT cont_id_contenido,cont_titulo,cont_contenido,cont_modulo FROM view_contenido_cemede;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
               
            }
        }
        return $request;
    }
}
