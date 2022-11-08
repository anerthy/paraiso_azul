<?php

require_once("Models/Traits/TAlimentacion.php");
require_once("Models/Traits/THospedaje.php");
require_once("Models/Traits/TTransporte.php");
require_once("Models/Traits/TTour.php");
class Servicios extends Controllers
{
    use TAlimentacion, THospedaje, TTransporte, TTour;

    public function __construct()
    {
        parent::__construct();
    }

    public function alimentacion()
    {
        $data['page_tag'] = "Alimentacion";
        $data['page_title'] = "Servicios de Alimentacion";
        $data['page_name'] = "viewalimentacion";
        $data['alimentacion'] = $this->getAlimentacionT();
        $this->views->getView($this, "alimentacion", $data);
    }

    public function hospedaje()
    {
        $data['page_tag'] = "Hospedaje";
        $data['page_title'] = "Servicios de Hospedaje";
        $data['page_name'] = "viewhospedajes";
        $data['hospedaje'] = $this->getHospedajesT();
        $this->views->getView($this, "hospedaje", $data);
    }


    public function transporte()
    {
        $data['page_tag'] = "transporte";
        $data['page_title'] = "Servicios de transporte";
        $data['page_name'] = "viewtransporte";
        $data['transportes'] = $this->getTransportesT();
        $this->views->getView($this, "transporte", $data);
    }

    public function tours()
    {
        $data['page_tag'] = "tours";
        $data['page_title'] = "Tours";
        $data['page_name'] = "tours";
        $data['tours'] = $this->getToursT();
        $this->views->getView($this, "tours", $data);
    }
}
