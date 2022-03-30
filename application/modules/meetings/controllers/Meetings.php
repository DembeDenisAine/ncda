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

        $perPage = 15;
        $page    = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $count   = $this->meetingModel->countMeetings();

        $data['page']      = $page;
        $data['meetings'] = $this->meetingModel->get($perPage,$page);
        $data['links']    = paginate('meetings',$count,$perPage,2);

        render_view($data);
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
       
        if(!empty($_GET['pdf'])):

            $data['view'] = 'export_details_pdf';
            $html = $this->load->view($data['module']."/".$data['view'],$data,true);
            $filename = "meeting_".$data['meeting']->id."_".time().".pdf";

            make_pdf($html,$filename,"D",true);
        else:
            $data['view']="details";
            render_view($data);
        endif;
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

        $data['page']      = $page;
        $data['contacts']  = $this->meetingModel->getContacts($perPage,$page);
        $data['links']     = paginate('contacts',$count,$perPage,2);

        if(!empty($_GET['pdf'])):

            $data['view'] = 'export_contacts_pdf';
            $html = $this->load->view($data['module']."/".$data['view'],$data,true);
            $filename = "contacts_".time().".pdf";

            make_pdf($html,$filename,"D",true);
        else:
            render_view($data);
        endif;

        
    }

    //save Contact/Meeting Particpant
    public function saveContact(){

        $data = $this->input->post();
        
        $this->meetingModel->saveContact($data);
        
        if(empty($_POST['meeting'])):
            set_flash('Contact saved successfully');
            redirect(site_url('contacts'));
        else:
            set_flash('Participant saved successfully');
          redirect(site_url('meeting/'.$_POST['meeting']));
        endif;
    }

     public function importContacts(){

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'csv';
            $config['max_size']     = '500';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('contacts')){

                $error = $this->upload->display_errors('<p>', '</p>');

                set_flash($error,true);
                redirect(site_url('contacts'));

            }else{

                $file = (Object) $this->upload->data();
                $data = read_csv('./uploads/'.$file->file_name);


                for($i=1; $i<count($data); $i++):

                    $row = $data[$i];

                    $formated_row = array(
                        'firstname'   => $row[0],
                        'lastname'    => $row[1],
                        'gender'      => $row[2],
                        'title'       => $row[3],
                        'email'       => $row[4],
                        'phone'       => $row[5],
                        'mobile'      => $row[6],
                        'address'     => $row[7]
                    );

                    $this->meetingModel->saveContact($formated_row);

                 endfor;

                set_flash('Participant imported successfully');
                redirect(site_url('contacts'));
            }
            

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
            render_view($data);
        else:
            //sharing with other module
            $this->load->view('meetings_calendar', $data);
        endif;
    }
}

