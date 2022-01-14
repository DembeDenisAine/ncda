<?php

class Activities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="activities";
        $this->load->model("activities_model",'activitiesModel'); //activities model
        $this->load->model("objectives_model",'objectivesModel'); //objectives model
            
    }

	public function index($id = false){  //activity list
	  
        if(!empty($id)){

            $data['activities'] = $this->activitiesModel->activities_by_objective_id($id);
            $project = $this->objectivesModel->find($id);
            $data['actv_name'] = $project->objective_name;
            $data['actv_id'] = $id;

        }else{
            $data['actv_name'] = '';
            $data['actv_id'] = '';
            $data['activities'] = $this->activitiesModel->activities_with_objectives_info();
        }

        $data['module']=$this->module;
        $data['title']="Activities";
        $data['view']="data";

        echo Modules::run('templates/main',$data);
	}
    
	public function create($id){ // add activity form
	
        $data['obj_actv'] = $this->objectivesModel->find($id);
        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['uptitle']="Main Activities";
        $data['view']="create";

        echo Modules::run('templates/main',$data);
	}

    public function store() { //activity list

        $this->activitiesModel->insert();
        return $this->response->redirect(site_url('activity-list'));
    }

    public function singleActivity($id = null){ //get activity page

        $data['objective'] = $this->activitiesModel->find($id);
        $data['objective_obj'] = $this->objectivesModel->find($id);
        print_r($data['objective_obj']);
        exit();

        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat activity

        $this->activitiesModel->update($id);
        return $this->response->redirect(site_url('activity-list'));
    }
 
    public function delete($id = null){ //delete activity

        $this->activitiesModel->delete($id);
        return $this->response->redirect(site_url('activity-list'));
    }  


}
