<?php

class Home extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Home";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "home", $data);
	}

	// Servicios

	public function alimentacion()
	{
		$data['page_id'] = 3;
		$data['page_tag'] = "alimentacion";
		$data['page_title'] = "alimentacion";
		$data['page_name'] = "alimentacion";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "Servicios/alimentacion", $data);
	}

	public function hospedaje()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "hospedaje";
		$data['page_title'] = "Servicio de Hospedaje";
		$data['page_name'] = "hospedaje";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "Servicios/hospedaje", $data);
	}

	// SobreNosotros

	public function cemede()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "CEMEDE";
		$data['page_title'] = "CEMEDE";
		$data['page_name'] = "cemede";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "SobreNosotros/cemede", $data);
	}
}
