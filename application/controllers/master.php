<?php

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('default_model'));
	}

	public function Index()
	{
		$this->master_admin();
	}

	public function master_admin($action="", $id="")
	{
		$post 	= $this->input->post();
		$action	= (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

		switch ($action) {
			case 'add':
						$tittle		= ".:: ADD/EDIT ::.";
						$view 		= "master/add";
						$getdata	= (!empty($id) ? $this->default_model->getdata("master_admin",array("id"=>$id)): "");
						$data		= (!empty($getdata) ? $getdata : "");
						$structure	= array(
							"first_name" 		=> "text",
							"last_name"	 		=> "text",
							"contact_person"	=> "text",
							"email"				=> "text",
							"username"			=> "text",
							"password"			=> "text",
							"type_admin_id"		=> "text",
							"status"			=> "status_lists"
							);
			break;

			case 'delete' :
						if(!empty($id))
						{
							$this->default_model->delete("master_admin",array("id"=>$id));
							redirect(site_url('master/master_admin'));
						}
			break;

			case 'save'	:
						$this->default_model->store("master_admin",$post);
						redirect(site_url('master/master_admin'));
			break;

			default:
					$tittle		= ".:: Default ::.";
					$view 		= "master/default";
					$data 		= $this->default_model->getdata("master_admin","","array");
					$structure	= array(
						"username"			=> "Username",
						"email"				=> "Email Address",
						"contact_person"	=> "Contact Persons",
						"type_admin_id"		=> "Type Users",
						"status"			=> "Status"
						);
			break;
		}

				$parse = array(
					"view"  	=> $view,
					"tittle"	=> $tittle,
					"data"		=> $data,
					"structure" => $structure,
					"page"		=> "master/master_admin"
					);
				$this->load->view('template',$parse);
	}

}