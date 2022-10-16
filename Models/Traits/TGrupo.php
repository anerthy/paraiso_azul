<?php
require_once("Libraries/Core/Mysql.php");
trait TGrupo
{
    public $con;

    public function getGruposT()
    {
        $this->con = new Mysql();
        $sql = "SELECT * FROM view_grupo_organizado_comunidad;"; //cambiar el * por los campos
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['logo'] = BASE_URL . '/Assets/images/uploads/' . $request[$i]['logo'];
            }
        }
        return $request;
    }
}
