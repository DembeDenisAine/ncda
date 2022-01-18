<?php

class Bactivities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="bactivities";
        $this->load->model("bactivities_model",'activitiesModel'); //branch acts model
    }

	public function index(){  //activity list
	  
        $data['activities'] = $this->activitiesModel->get();
        $data['module'] = $this->module;
        $data['title']  = "Branch  Activities";
        $data['view']   = "data";

        echo Modules::run('templates/main',$data);
	}
    
	
    public function store() { //activity list

        $this->activitiesModel->insert();
        set_flash('Activity saved successfully');
        return redirect(site_url('branch-acts'));
    }

    public function singleActivity($id = null){ //get activity page

        $data['activity'] = $this->activitiesModel->find($id);

        $data['module']=$this->module;
        $data['title']="Branch Activity Detail";
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
