<?php

class Activities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="activities";
        $this->load->model("activities_model",'activitiesModel'); //activities model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //objectives model
            
    }

	public function index($id = false){  //activity list
	  
        $data['activities'] = $this->activitiesModel->activities_by_objective_id($id);
        $data['objective']  = $this->objectivesModel->find($id);
           
        $data['module'] = $this->module;
        $data['title']  = "Objective  Activities";
        $data['view']   = "data";

        echo Modules::run('templates/main',$data);
	}
    
	public function create($id){ // add activity form
	
        $data['objective'] = $this->objectivesModel->find($id);
        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['uptitle']="Main Activities";
        $data['view']="create";

        echo Modules::run('templates/main',$data);
	}

    public function store() { //activity list

        $this->activitiesModel->insert();
        $objectiveId = $this->input->post('objective_id');
        set_flash('Activity saved successfully');
        return redirect(site_url('activity-list/'.$objectiveId));
    }

    public function singleActivity($id = null){ //get activity page

        $data['objective'] = $this->activitiesModel->find($id);
        $data['objective_obj'] = $this->objectivesModel->find($id);
       
        $data['module']=$this->module;
        $data['title']="Objective - Activities";
        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat activity

        $this->activitiesModel->update();
        $objectiveId = $this->input->post('objective_id');
        set_flash('Activity saved successfully');
        return redirect(site_url('activity-list/'.$objectiveId));
    }
 
    public function delete($id = null){ //delete activity

        $this->activitiesModel->delete($id);
        return redirect(site_url('activity-list'));
    }  


}
