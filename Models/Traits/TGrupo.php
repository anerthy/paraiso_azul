<?php
require_once("Libraries/Core/Mysql.php");
trait TGrupo
{
    public $con;

    public function getGruposT()
    {
        $this->con = new Mysql();
        $sql = "SELECT id_grupo,nombre_grupo,representante,descripcion,ubicacion,correo,telefono,numero_integrantes,logo,nombre_com FROM view_grupo_organizado_comunidad;";
        $request = $this->con->select_all($sql);
        if (count($request) > 0) {
            for ($i = 0; $i < count($request); $i++) {
                $request[$i]['logo'] = BASE_URL . '/Assets/images/uploads/grupos/' . $request[$i]['logo'];
            }
        }
        return $request;
    }
}
