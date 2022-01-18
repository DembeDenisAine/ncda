<?php

class Facilitation extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="facilitation";
        $this->load->model("facilitation_model",'facilitationModel'); //Facilitation model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');
    }

    public function index()
    {   
        $data['transactions'] = $this->facilitationModel->get();
        $data['facilities']   = $this->facilitiesnModel->get();
        
        $data['module'] = $this->module;
        $data['title']  = "Facilitation";
        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function store() { //save record
        $this->facilitationModel->insert();

        if(!empty($this->input->post('id'))){
          set_flash('Record updated successfully');
        }else{
          set_flash('Record saved successfully');
        }
        
        return redirect(site_url('facilitation'));
    }

    public function delete($id = null){ //delete parameters

        $this->facilitationModel->delete($id);
        return redirect(site_url('facilitation'));
    }  


}

