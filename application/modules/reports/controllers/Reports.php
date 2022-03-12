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

        $this->load->model("facilitation/facilitation_model",'facilitationModel'); //Facilitation model
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

	public function visual_report($projectId){

		$data['objectives'] = ($projectId != null)?objectives($projectId):[];
		$data['project']    = $this->projectsModel->find($projectId);

		$data['title']  = "Project Visualization Report";
        $data['view']   = "project_visualization";
		$data['module'] = $this->module;
        
        echo Modules::run('templates/main',$data);
	}

	public function activities($value='')
	{
		
		$data['objectives'] = $this->objectivesModel->core_objectives();
		$data['title']      = "Branch Activity Report";
        $data['view']       = "report_activities";
		$data['module']     = $this->module;
        
        echo Modules::run('templates/main',$data);
	}

	 
    public function facilitation()
    {   
        $data['transactions'] = $this->facilitationModel->get();
        $data['facilities']   = $this->facilitiesnModel->get();
        
        $data['module'] = $this->module;
        $data['title']  = "Facilitation Report";
        $data['view']="facilitation_report";

        echo Modules::run('templates/main',$data);
    }
	

}
