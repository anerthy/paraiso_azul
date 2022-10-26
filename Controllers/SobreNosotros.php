<?php
require_once("Models/Traits/TGrupo.php");
require_once("Models/Traits/TComunidad.php");
require_once("Models/Traits/TProyecto.php");

class SobreNosotros extends Controllers
{
    use TGrupo, TComunidad, TProyecto;
    public function __construct()
    {
        parent::__construct();
    }

    public function proyecto()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Proyecto";
        $data['page_title'] = "Proyecto";
        $data['page_name'] = "proyecto";
        $data['proyecto'] = $this->getProyectoT();
        $this->views->getView($this, "proyecto", $data);
    }

    public function grupos()
    {
        $data['page_tag'] = "Grupos Organizados";
        $data['page_title'] = "Grupos Organizados";
        $data['page_name'] = "viewgrupos";
        $data['grupos'] = $this->getGruposT();
        $this->views->getView($this, "grupos", $data);
    }

    public function comunidades()
    {
        $data['page_tag'] = "Comunidades Organizados";
        $data['page_title'] = "Comunidades Organizados";
        $data['page_name'] = "viewcomunidades";
        $data['comunidades'] = $this->getComunidadesT();
        $this->views->getView($this, "comunidades", $data);
    }
}
