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
 
    // Renders Contacts List
    public function delete($id = null){ //delete objective

        $this->projectsModel->delete($id);
        return $this->response->redirect(site_url('parameter-list'));
    }  

    // Renders Contacts List
    public function contacts(){ 
    
        $data['module'] = $this->module;
        $data['title']  = "Contacts List";
        $data['view']   = "contacts";
        $count  = $this->meetingModel->countContacts();

        $page    = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $perPage = 20;

        $data['contacts']  = $this->meetingModel->getContacts($perPage,$page);
        $data['links']     = paginate('contacts',$count,1,2);

        print_r($data);
        exit();

        echo Modules::run('templates/main',$data);
    }

    //save Contact/Meeting Particpant
    public function saveContact(){
        
        $this->meetingModel->saveContact();
        
        if(empty($_POST['meeting'])):
            set_flash('Contact saved successfully');
            redirect(site_url('contacts'));
        else:
            set_flash('Participant saved successfully');
          redirect(site_url('meeting/'.$_POST['meeting']));
        endif;
    }

    //save Discussion
    public function saveDiscussion(){
        
        $this->meetingModel->saveDiscussion();
        
        if(!empty($_POST['discussion'])):
            set_flash('Discussion updated successfully');
        else:
            set_flash('Discussion saved successfully');
        endif;
        
        redirect(site_url('meeting/'.$_POST['meeting']));
    }

    //save Discussion
    public function saveAction(){
        
        $this->meetingModel->saveActionPoint();
        
        if(!empty($_POST['action_id'])):
            set_flash('Action Point updated successfully');
        else:
            set_flash('Action Point saved successfully');
        endif;
        
        redirect(site_url('meeting/'.$_POST['meeting']));
    }

    


    


}

