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

		$projectId = ($this->input->post('project')!=null)?$this->input->post('project'):null;

		$data['projects']	= $this->projectsModel->get(100,0);
		$data['objectives'] = ($projectId != null)?objectives($projectId):[];
		$data['project']    = null;

		if($projectId !=null ){
			$data['project'] = $this->projectsModel->find($projectId);
			$html = $this->load->view('report_projects',$data,true);
			echo $html;
			return;
		}
		
		$data['title']  = "Reports";
        $data['view']   = "data";
		$data['module'] = $this->module;
        
        echo Modules::run('templates/main',$data);

	}
	

}
