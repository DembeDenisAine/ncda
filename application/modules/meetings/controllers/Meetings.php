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
       
        $data['module']   = $this->module;
        $data['title']    = "Meetings";
        $data['view']     = "meetings_list";

        $perPage = 3;
        $page    = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $count   = $this->meetingModel->countMeetings();

        $data['meetings'] = $this->meetingModel->get($perPage,$page);
        $data['links']    = paginate('meetings',$count,$perPage,2);

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

    public function update(){ //updat objective
        $this->meetingModel->update();
        set_flash('Meeting updated successfully');
        return redirect(site_url('meetings'));
    }
 
    // Renders Contacts List
    public function delete($id = null){ //delete objective

        $this->meetingModel->delete($id);
        return redirect(site_url('parameter-list'));
    }  

    // Renders Contacts List
    public function contacts(){ 
    
        $data['module'] = $this->module;
        $data['title']  = "Contacts List";
        $data['view']   = "contacts_list";

        $count   = $this->meetingModel->countContacts();
        $page    = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $perPage = 15;

        $data['contacts']  = $this->meetingModel->getContacts($perPage,$page);
        $data['links']     = paginate('contacts',$count,$perPage,2);

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

     /**
     * Get All Meetings and render them oon calendar
    */
    public function meetingCalendar($sharingAcess=false)
    {
        $meetings = $this->meetingModel->get(10,0);
        $data = array();

        foreach ($meetings as $key => $value) {
            $data['data'][$key]['title'] = $value->meeting_name;
            $data['data'][$key]['start'] = $value->meeting_date;
            $data['data'][$key]['end'] = $value->meeting_date;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
        
        $data['title'] = "Meetings Calendar";

        if(!$sharingAcess): 
            //when accessed directly in browser
            $data['view'] = 'meetings_calendar';
            $data['module'] = $this->module;
            echo Modules::run('templates/main',$data);
        else:
            //sharing with other module
            $this->load->view('meetings_calendar', $data);
        endif;
    }
}

