<?php

class Parameters extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="parameters";
        $this->load->model("parameters_model",'parametersModel'); //Parameters model
        $this->load->model("activities/activities_model",'activitiesModel'); //activities model
            
    }

    public function index($id = false)
    {   
        $data['parameters'] = $this->parametersModel->parameters_by_activity_id($id);
        $data['activity']   = $this->activitiesModel->find($id);
        
        $data['module'] = $this->module;
        $data['title']  = "Activity Parameters";
        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create($id){ // add parameters form
    
        $data['module']=$this->module;
        $data['title']="Create a Parameter";

        $activity = $this->activitiesModel->find($id);
        $data['actv_name'] = $activity->activity_name;
        $data['actv_id'] = $id;

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save parameter
        $this->parametersModel->insert();
        $activityId = $this->input->post('activity_id');
        set_flash('Paramter saved successfully');
        return redirect(site_url('parameter-list/'.$activityId));
    }


    public function singleParameter($id = null){ //show parameter project

        $data['parameter']     = $this->parametersModel->find($id);
        $data['activity']      = $this->activitiesModel->find($id);

        $data['module']=$this->module;
        $data['title']="Parameters";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat parameter

        $this->parametersModel->update();
        $activityId = $this->input->post('activity_id');
        set_flash('Paramter updated successfully');
        return redirect(site_url('parameter-list/'.$activityId));
    }
 
    public function delete($id = null){ //delete parameters

        $this->parametersModel->delete($id);
        return redirect(site_url('parameter-list'));
    }  


}

