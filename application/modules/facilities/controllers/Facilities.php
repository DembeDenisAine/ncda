<?php

class Facilities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="facilities";
        $this->load->model("districts_model",'DM'); //Districts model
        $this->load->model("facilities_model",'FM'); //Facilities model
            
    }

    public function index($id = false)
    {   

        if(!empty($id)){
            $data['facilities'] = $this->FM->facilities_by_district($id);
            $data['districts']  = $this->DM->get();

            $district = $this->PM->find($id);
            $data['district'] = $district->district_name;
            $data['district_id'] = $id;

        }else{
            $data['district'] = '';
            $data['district_id'] = '';
            $data['districts']  = $this->DM->get();
            $data['facilities'] = $this->FM->get();
        }
        
        $data['module']=$this->module;
        $data['title']="Facilities";
        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    public function create(){ // add facilities form
    
        $data['module']=$this->module;
        $data['title']="Add Facilities";

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //facility list

        $this->AM->insert();
        return $this->response->redirect(site_url('facility-list'));
    }

    public function singleFacility($id = null){ //get facility page

        $data['facility'] = $this->FM->find($id);
        $data['districts'] =  $this->DM->find($id);

        $data['module']=$this->module;
        $data['title']="Facility";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //update facility

        $this->AM->update($id);
        return $this->response->redirect(site_url('facility-list'));
    }
 
    public function delete($id = null){ //delete facility

        $this->AM->delete($id);
        return $this->response->redirect(site_url('facility-list'));
    }  


}
