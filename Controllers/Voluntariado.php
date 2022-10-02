<?php

class Voluntariado extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function voluntariado()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "voluntariado";
        $data['page_title'] = "voluntariado";
        $data['page_name'] = "voluntariado";
        $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
        $this->views->getView($this, "voluntariado", $data);
    }
}
