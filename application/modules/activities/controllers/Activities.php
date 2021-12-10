<?php

class Activities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="activities";
        $this->load->model("activities_model",'AM'); //activities model
        $this->load->model("objectives_model",'OM'); //objectives model
            
    }


	public function index($id = false){  //activity list
	  
        if(!empty($id)){
            $data['activities'] = $this->AM->activities_by_objective_id($id);

            $project = $this->OM->find($id);
            $data['actv_name'] = $project->objective_name;
            $data['actv_id'] = $id;

        }else{
            $data['actv_name'] = '';
            $data['actv_id'] = '';
            $data['activities'] = $AM->activities_with_objectives_info();
        }

        $data['module']=$this->module;
        $data['title']="Activities";
        $data['uptitle']="Main Activities";
        $data['view']="data";
        echo Modules::run('templates/main',$data);
	}
    
	public function create($id){ // add activity form
	
        $data['obj_actv'] = $this->OM->find($id);

        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['uptitle']="Main Activities";
        $data['view']="create";
        echo Modules::run('templates/main',$data);
	}

    public function store() { //activity list

        $this->AM->insert();
        return $this->response->redirect(site_url('activity-list'));
    }

    public function singleActivity($id = null){ //get activity page

        $data['objective'] = $this->AM->find($id);
        $data['objective_obj'] =  $this->OM->find($id);

        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['uptitle']="Main Activities";
        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat activity

        $this->AM->update($id);
        return $this->response->redirect(site_url('activity-list'));
    }
 
    public function delete($id = null){ //delete activity

        $this->AM->delete($id);
        return $this->response->redirect(site_url('activity-list'));
    }  


}
