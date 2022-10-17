<?php

class Dashboard extends Controllers
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
		getPermisos(1);
	}

	public function dashboard()
	{
		if (empty($_SESSION['permisosMod']['ver'])) {
			header("Location:" . base_url() . '/access_denied');
		}
		$data['page_id'] = 1;
		$data['page_tag'] = "Dashboard - Paraiso Azul";
		$data['page_title'] = "Dashboard";
		$data['page_name'] = "dashboard";
		$this->views->getView($this, "dashboard", $data);
	}
}
