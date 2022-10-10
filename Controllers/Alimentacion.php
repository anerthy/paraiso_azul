<?php

class Alimentacion extends Controllers
{
    public function __construct()
    {
        parent::__construct();

        session_start();
        session_regenerate_id(true);
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        getPermisos(6);
    }

    public function Alimentacion()
    {
        if (empty($_SESSION['permisosMod']['ver'])) {
            header("Location:" . base_url() . '/dashboard');
        }
        $data['page_id'] = 3;
        $data['page_tag'] = "Alimentacion";
        $data['page_name'] = "alimentacion";
        $data['page_title'] = "Alimentacion";
        $data['page_functions_js'] = "functions_alimentacion.js";
        $this->views->getView($this, "alimentacion", $data);
    }

    public function getAlimentaciones()
    {
        $arrData = $this->model->selectAlimentaciones();

        for ($i = 0; $i < count($arrData); $i++) {
            $btnView = '';
            $btnEdit = '';
            $btnDelete = '';

            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }


            // boton de ver
            if ($_SESSION['permisosMod']['ver']) {
                $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo(' . $arrData[$i]['id_alimentacion'] . ')" title="Ver alimentacion"><i class="far fa-eye"></i></button>';
            }

            // boton de actualizar
            if ($_SESSION['permisosMod']['actualizar']) {
                $btnEdit = '<button class="btn btn-primary btn-sm fntEditAlimentacion" onClick="fntEditAlimentacion(' . $arrData[$i]['id_alimentacion'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            } else {
                $btnEdit = '<button class="btn btn-primary btn-sm" disabled><i class="fas fa-pencil-alt"></i></button>';
            }

            // boton de eliminar
            if ($_SESSION['permisosMod']['eliminar']) {
                $btnDelete = '<button class="btn btn-danger btn-sm fntDelAlimentacion" onClick="fntDelAlimentacion(' . $arrData[$i]['id_alimentacion'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>';
            } else {
                $btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
            }

            $arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getSelectAlimentaciones()
    {
        $htmlOptions = "";
        $arrData = $this->model->selectAlimentaciones();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                if ($arrData[$i]['status'] == 1) {
                    $htmlOptions .= '<option value="' . $arrData[$i]['id_alimentacion'] . '">' . $arrData[$i]['nombre_alim'] . '</option>';
                }
            }
        }
        echo $htmlOptions;
        die();
    }

    public function getAlimentacion(int $id_alimentacion)
    {
        $intId_alimentacion = intval(strClean($id_alimentacion));
        if ($intId_alimentacion > 0) {
            $arrData = $this->model->selectAlimentacion($intId_alimentacion);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrData['url_imagen'] = media() . '/images/uploads/' . $arrData['imagen'];
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setAlimentacion()
    {
        $intId_alimentacion = intval($_POST['id_Alimentacion']);
        $strAlimentacion =  strClean($_POST['txtNombre_alim']);
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $strDireccion = strClean($_POST['txtDireccion']);
        $strHoraApertura = strClean($_POST['txtHoraApertura']);
        $strHoraCierre = strClean($_POST['txtHoraCierre']);
        $strTelefono = strClean($_POST['txtTelefono']);
        $intStatus = intval($_POST['listStatus']);

        $foto       = $_FILES['foto'];
        $nombre_foto     = $foto['name'];
        $type              = $foto['type'];
        $url_temp        = $foto['tmp_name'];
        $imgImagen     = 'portada_categoria.png';
        $request_grupo = "";
        if ($nombre_foto != '') {
            $imgImagen = 'img_' . md5(date('d-m-Y H:m:s')) . '.jpg';
        }

        if ($intId_alimentacion == 0) {
            //Crear
            $request_alimentacion = $this->model->insertAlimentacion(
                $strAlimentacion,
                $strDescripcion,
                $strDireccion,
                $strHoraApertura,
                $strHoraCierre,
                $strTelefono,
                $intStatus,
                $imgImagen
            );
            $option = 1;
        } else {
            //Actualizar
            if ($nombre_foto == '') {
                if ($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0) {
                    $imgImagen = $_POST['foto_actual'];
                }
            }
            $request_alimentacion = $this->model->updateAlimentacion($intId_alimentacion, $strAlimentacion, $strDescripcion, $strDireccion,  $strHoraApertura, $strHoraCierre, $strTelefono, $intStatus, $imgImagen);
            $option = 2;
        }

        if ($request_alimentacion > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage($foto, $imgImagen);
                }
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                if ($nombre_foto != '') {
                    uploadImage($foto, $imgImagen);
                }


                if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
                    || ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')
                ) {
                    deleteFile($_POST['foto_actual']);
                }
            }
        } else if ($request_alimentacion == 'exist') {

            $arrResponse = array('status' => false, 'msg' => '¡Atención! El servicio de alimentacion ya existe.');
        } else {
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delAlimentacion()
    {
        if ($_POST) {
            $intId_alimentacion = intval($_POST['id_alimentacion']);
            $requestDelete = $this->model->deleteAlimentacion($intId_alimentacion);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la alimentacion');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la alimentacion.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}
