<?php
require_once("Libraries/Core/Mysql.php");
trait TCount
{
    public $con;

    public function countRegistrosT()
    {
        $this->con = new Mysql();
        $sql = "SELECT 'Usuario' as 'Modulo', COUNT(id_usuario) as 'Registros' from usuario
        UNION
        SELECT 'Rol', COUNT(id_rol) from rol
        UNION
        SELECT 'Grupo',COUNT(id_grupo) from grupo_organizado
        UNION
        SELECT 'Comunidad',COUNT(id_comunidad) from comunidad
        UNION
        SELECT 'Alimentacion',COUNT(id_alimentacion) from alimentacion
        UNION
        SELECT 'Hospedaje', COUNT(id_hospedaje) from hospedaje
        UNION
        SELECT 'Transporte', COUNT(id_transporte) from transporte
        UNION
        SELECT 'Tour', COUNT(id_tour) from tour
        UNION
        SELECT 'Voluntario', COUNT(id_voluntario) from voluntario
        UNION
        SELECT 'Contenido', COUNT(cont_id_contenido) from tbl_contenido_pagina
        UNION
        SELECT 'Galeria', COUNT(gal_id_galeria) from tbl_galeria";
        $request = $this->con->select_all($sql);
        return $request;
    }
}
