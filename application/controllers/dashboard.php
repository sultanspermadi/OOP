<?php

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('default_model'));
	}

	public function index()
	{
		$data = array(
			"tittle" => ".:: Dashboard ::.",
			"data"	 => "dashboard/default"
			);

		$this->load->view('template',$data);
	}

}