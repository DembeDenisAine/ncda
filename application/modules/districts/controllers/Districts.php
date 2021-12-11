<?php

class Districts extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="districts";
        $this->load->model("districts_model",'DM'); //districts model
            
    }

    public function index(){  //district list
    
        $data['module']=$this->module;
        $data['title']="Districts";
        $data['view']="data";

        $data['districts'] = $this->DM->get();
        echo Modules::run('templates/main',$data);
    }
    
    public function create(){ // add districts form
    
        $data['module']=$this->module;
        $data['title']="Create Districts";

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save district

        $this->DM->insert();
        return $this->response->redirect(site_url('district-list'));
    }

    public function singleDistrict($id = null){ //get district page

        $data['dt_obj'] = $this->DM->find($id);
        $data['module']=$this->module;
        $data['title']="Districts";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function teams($id = null){ //get district teams

        $data['teams'] = $this->DM->district_teams($id);
        $data['facilities'] = $this->DM->facilities_by_district($id);
        $data['district'] = $this->DM->find($id);
        $data['district_id']=$id;
        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="teams";
        echo Modules::run('templates/main',$data);
    }

    public function create_team($id = null){ //get district teams

        $data['district_id']=$id;
        $data['facilities'] = $this->DM->get_facilities($id);
        //$data['facilities'] = $this->DM->facilities_by_district($id);
        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="create_teams";
        echo Modules::run('templates/main',$data);
    }


    public function update($id = null){ //updat district

        $this->AM->update($id);
        return $this->response->redirect(site_url('district-list'));
    }
 
    public function delete($id = null){ //delete district

        $this->AM->delete($id);
        return $this->response->redirect(site_url('district-list'));
    }  


}

