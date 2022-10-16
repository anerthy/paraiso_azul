<?php
require_once("Models/Traits/THospedaje.php");
class Servicios extends Controllers
{
    use THospedaje;
    public function __construct()
    {
        parent::__construct();
    }

    public function alimentacion()
    {
        $data['page_id'] = 1;
        $data['page_tag'] = "alimentacion";
        $data['page_title'] = "Servicio de Alimentacion";
        $data['page_name'] = "alimentacion";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "alimentacion", $data);
    }

    public function hospedaje()
    {
        $data['page_tag'] = "Hospedaje";
        $data['page_title'] = "Hospedaje";
        $data['page_name'] = "viewhospedajes";
        $data['hospedaje'] = $this->getHospedajesT();
        $this->views->getView($this, "hospedaje", $data);
    }
  

    public function transporte()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "transporte";
        $data['page_title'] = "Servicio de transporte";
        $data['page_name'] = "transporte";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "transporte", $data);
    }

    public function tours()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "tours";
        $data['page_title'] = "Tours";
        $data['page_name'] = "tours";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "tours", $data);
    }
}
