<?php

class Meetings extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="meetings";
        $this->load->model("Meetings_model",'meetingModel'); //meetings model
            
    }

    public function index()
    {   
        $data['meetings'] = $this->meetingModel->get();
        $data['module']   = $this->module;
        $data['title']    = "Meetings";
        $data['view']     = "data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create(){ // add objectives form
    
        $data['module'] = $this->module;
        $data['title']  = "Create a Meeting";
        $data['view']   = "create";

        echo Modules::run('templates/main',$data);
    }

    public function store() { //save meeting

        $this->meetingModel->insert();
        set_flash('Meeting saved successfully');
        redirect(site_url('meetings'));
    }


    public function meetingDetail($id = null){ //show single objective

        $meeting              = $this->meetingModel->find($id);
        $data['participants'] = $this->meetingModel->getAttendants($id);
        $data['impacts']      = $this->meetingModel->getImpacts($id);
        $data['discussions']  = $this->meetingModel->getDiscussions($id);
        $data['actions']      = $this->meetingModel->getActionPoints($id);
        $data['meeting']      = $meeting;

        $data['module'] = $this->module;
        $data['title']  = "Meeting Details";

        $data['view']="details";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat objective

        $this->projectsModel->update($id);
        return $this->response->redirect(site_url('objective-list'));
    }
 
    public function delete($id = null){ //delete objective

        $this->projectsModel->delete($id);
        return $this->response->redirect(site_url('parameter-list'));
    }  

    public function contacts(){ // add objectives form
    
        $data['module'] = $this->module;
        $data['title']  = "Contacts List";
        $data['view']   = "contacts";
        $data['contacts']  = $this->meetingModel->getContacts();

        echo Modules::run('templates/main',$data);
    }



}

