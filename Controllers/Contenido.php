<?php

class Contenido extends Controllers
{
    public function __construct()
    {
        sessionStart();
        parent::__construct();
        //session_start();
        //session_regenerate_id(true);
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        getPermisos(11);
    }

    public function Contenido()
    {
        if (empty($_SESSION['permisosMod']['ver'])) {
            header("Location:" . base_url() . '/access_denied');
        }
        $data['page_id'] = 5;
        $data['page_tag'] = "Contenido de paginas";
        $data['page_name'] = "contenido de paginas";
        $data['page_title'] = "Contenido de paginas";
        $data['page_functions_js'] = "functions_contenido.js";
        $this->views->getView($this, "contenido", $data);
    }

    public function getContenidos()
    {
        $arrData = $this->model->selectContenidos();

        for ($i = 0; $i < count($arrData); $i++) {

            $btnView = '';
            $btnEdit = '';
            $btnDelete = '';

            // boton de ver
            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['cont_id_contenido'] . ')" title="Ver contenido"><i class="far fa-eye"></i></button>';
            }

            // boton de actualizar
            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm btnEditContenido" onClick="fntEditContenido(' . $arrData[$i]['cont_id_contenido'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }

            // boton de eliminar
            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDelete = '<button class="btn btn-danger btn-sm btnDelContenido" onClick="fntDelContenido(' . $arrData[$i]['cont_id_contenido'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';

            ///MODULOS
            if ($arrData[$i]['cont_modulo'] == 'Grupos Organizados') {
                $arrData[$i]['cont_modulo'] = '<span>Grupos Organizados</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Comunidades') {
                $arrData[$i]['cont_modulo'] = '<span>Comunidades</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Alimentacion') {
                $arrData[$i]['cont_modulo'] = '<span>Alimentacion</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Tours') {
                $arrData[$i]['cont_modulo'] = '<span>Tours</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Hospedaje') {
                $arrData[$i]['cont_modulo'] = '<span>Hospedaje</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Transporte') {
                $arrData[$i]['cont_modulo'] = '<span>Transporte</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Voluntario') {
                $arrData[$i]['cont_modulo'] = '<span>Voluntario</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'Inicio') {
                $arrData[$i]['cont_modulo'] = '<span>Inicio</span>';
            } elseif ($arrData[$i]['cont_modulo'] == 'CEMEDE') {
                $arrData[$i]['cont_modulo'] = '<span>CEMEDE</span>';
            }
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getContenido(int $id_contenido)
    {
        $intId_contenido = intval(strClean($id_contenido));
        if ($intId_contenido > 0) {
            $arrData = $this->model->selectContenido($intId_contenido);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setContenido()
    {

        $intId_contenido = intval($_POST['id_Contenido']);
        $strTitulo =  strClean($_POST['txtTitulo']);
        $strContenido = strClean($_POST['txtContenido']);
        $strModulo = strClean($_POST['txtModulo']);


        if ($intId_contenido == 0) {
            //Crear
            $request_contenido = $this->model->insertContenido($strTitulo, $strContenido, $strModulo);
            $option = 1;
        } else {
            //Actualizar
            $request_contenido = $this->model->updateContenido($intId_contenido, $strTitulo, $strContenido, $strModulo);
            $option = 2;
        }

        if ($request_contenido > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }
        } else if ($request_contenido == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! Este contenido de pagina ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delContenido()
    {
        if ($_POST) {
            $intId_contenido = intval($_POST['cont_id_contenido']);
            $requestDelete = $this->model->deleteContenido($intId_contenido);
            if ($requestDelete == 'ok') {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el contenido');
            } else if ($requestDelete == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un contenido porque está ligado.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el contenido.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
