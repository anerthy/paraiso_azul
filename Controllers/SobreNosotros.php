<?php
require_once("Models/Traits/TGrupo.php");
class SobreNosotros extends Controllers
{
    use TGrupo;
    public function __construct()
    {
        parent::__construct();
    }

    public function cemede()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "CEMEDE";
        $data['page_title'] = "CEMEDE";
        $data['page_name'] = "cemede";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "cemede", $data);
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
        $data['page_id'] = 3;
        $data['page_tag'] = "comunidades";
        $data['page_title'] = "Comunidades";
        $data['page_name'] = "comunidades";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "comunidades", $data);
    }
}
