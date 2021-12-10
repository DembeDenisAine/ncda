<?php

class Parameters extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="parameters";
        $this->load->model("parameters_model",'PM'); //Parameters model
        $this->load->model("activities_model",'AM'); //activities model
            
    }

    public function index($id = false)
    {   

        if(!empty($id)){
            $data['parameters'] = $this->PM->parameters_by_activity_id($id);

            $activity = $this->AM->find($id);
            $data['actv_name'] = $activity->activity_name;
            $data['actv_id'] = $id;

        }else{
            $data['actv_name'] = '';
            $data['actv_id'] = '';
            $data['parameters'] = $this->PM->parameters_with_activities_info();
        }
        
        $data['module']=$this->module;
        $data['title']="Parameters";

        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create(){ // add parameters form
    
        $data['module']=$this->module;
        $data['title']="Create a Parameter";

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save parameter

        $this->PM->insert();
        return $this->response->redirect(site_url('parameter-list'));
    }


    public function singleProject($id = null){ //show parameter project

        $data['objective'] = $this->PM->find($id);
        $data['objective_obj'] = $this->AM->find($id);

        $data['module']=$this->module;
        $data['title']="Parameters";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat parameter

        $this->PM->update($id);
        return $this->response->redirect(site_url('parameter-list'));
    }
 
    public function delete($id = null){ //delete parameters

        $this->PM->delete($id);
        return $this->response->redirect(site_url('parameter-list'));
    }  


}

