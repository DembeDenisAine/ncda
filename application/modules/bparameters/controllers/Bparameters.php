<?php

class Bparameters extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="bparameters";
        $this->load->model("bparameters_model",'parametersModel'); //Parameters model
        $this->load->model("bactivities/bactivities_model",'activitiesModel'); //activities model
            
    }

    public function index($id = false)
    {   
        $data['parameters'] = $this->parametersModel->parameters_by_activity_id($id);
        $data['activity']   = $this->activitiesModel->find($id);
        
        $data['module'] = $this->module;
        $data['title']  = "Activity Parameters";
        $data['view']="data";

        render_view($data);
    }
    
    
    public function store() { //save parameter
        $this->parametersModel->insert();
        $activityId = $this->input->post('activity_id');
        set_flash('Paramter saved successfully');
        return redirect(site_url('branch-param/'.$activityId));
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

