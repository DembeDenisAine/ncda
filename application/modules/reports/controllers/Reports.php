<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller {

	
	public function __Construct(){

		parent::__Construct();

		$this->load->model("projects/projects_model",'projectsModel'); //Projects model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //Objectives model
        $this->load->model("activities/activities_model",'activitiesModel'); //Activities model
        $this->load->model("districts/districts_model",'districtsModel'); //Districts model
        $this->load->model("parameters/parameters_model",'parametersModel'); //Districts model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');
		$this->module = 'reports';

	}

	public function projects(){

		$data['projects']	= $this->projectsModel->get(100,0);
		$data['objectives'] = objectives(9);

		if($this->input->post()){
			print_r($this->input->post());
			exit();

		}

		$data['title'] = "Reports";
        $data['view']  = "data";
		$data['module'] = $this->module;
        
        echo Modules::run('templates/main',$data);

	}
	

}
