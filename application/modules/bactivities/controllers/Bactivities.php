<?php

class Bactivities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="bactivities";
        $this->load->model("bactivities_model",'activitiesModel'); //branch acts model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');
        $this->load->model("bparameters/bparameters_model",'parametersModel');
        $this->load->model("objectives/objectives_model",'objectivesModel'); //Objectives 
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


    public function dataEntry(){ //show single project

        //$activities   = $this->activitiesModel->get();
       
        $data['objectives']    = $this->objectivesModel->core_objectives();


        $objectiveId = ($this->input->post('objective_id'))?$this->input->post('objective_id'):null;

        $activities   = ($objectiveId)?$this->activitiesModel->activities_by_objective_id($objectiveId):[];

        $data['selectedFacility'] = ($this->input->post('facility'))?$this->input->post('facility'):null;
        $data['activities']    = $this->paramtizedActivities($activities );

        $objectiveId = ($this->input->post('objective_id'))?$this->input->post('objective_id'):null;
        $data['selectedObjective']  = ($objectiveId)? $this->objectivesModel->find($objectiveId): null;

        $data['facilities']    = $this->facilitiesnModel->get();
        $data['module']        = $this->module;

        $data['title'] = "Branch Activity Data Entry";
        $data['view']  = "branch_data_entry";
        
        echo Modules::run('templates/main',$data);
    }

    private function paramtizedActivities($activities){
        
        foreach($activities as $act){
            $act->parameters   = $this->parametersModel->parameters_by_activity_id($act->id);
        }
        return $activities;
    }


    public function submitData(){

        $this->activitiesModel->saveData();
        set_flash('Activty data saved successfully');
        redirect(site_url('branch/dataentry'));
    }


}
