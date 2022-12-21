<?php
require_once("Models/Traits/TCount.php");
class Dashboard extends Controllers
{
	use TCount;
	public function __construct()
	{
		sessionStart();
		parent::__construct();
	
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
		$data['page_tag'] = "Dashboard";
		$data['page_title'] = "Dashboard";
		$data['page_name'] = "dashboard";
		$data['modulos'] = $this->countRegistrosT();
		$this->views->getView($this, "dashboard", $data);
	}
}
