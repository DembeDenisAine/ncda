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

        $data = array(
                     'meeting_name'        => $this->input->post('title'),
                    'meeting_description' => $this->input->post('description'),
                    'meeting_date'        => $this->input->post('date'),
                    'venue'               => $this->input->post('venue'),
                    'start_at'            => $this->input->post('start_time'),
                    'end_at'              => $this->input->post('end_time')
                            );

        $this->meetingModel->insert($data);
        set_flash('Meeting saved successfully');
        redirect(site_url('meetings'));
    }


     public function importMeetings(){

        $config['upload_path'] = FCPATH.'uploads/';
        $config['allowed_types'] = 'csv|xls|xlsx';
        $config['max_size']      = 200000;
        $config['file_name']     ="contacts_file";

        //$file_name=$config['file_name'];

       $this->load->library('upload', $config);

       $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('import_file'))
        {
                $alert = $this->upload->display_errors('<p>', '</p>');
        }
        else
        {    
            
            $file_name= $this->upload->data('file_name'); 

            $this->load->library('excel');
            
            $type = PHPExcel_IOFactory::identify('uploads/'.$file_name);
            
            $objReader=PHPExcel_IOFactory::createReader($type);     //For excel 2003 
              //Set to read only
            $objReader->setReadDataOnly(true);          
            //Load excel file
            $objPHPExcel=$objReader->load(strip_tags(FCPATH.'uploads/'.$file_name));    
            
             
            $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
            $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);  
             
            $rowsnow = 0;
             //loop from first data untill last data
             for($i=2;$i<=$totalrows;$i++)
              {

                  $title      = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                  $description= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                  $date       = $this->getExcelDate($objWorksheet->getCellByColumnAndRow(2,$i)->getFormattedValue());
                  $venue      = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                  $start_time = $this->getExcelTime($objWorksheet->getCellByColumnAndRow(4,$i)->getCalculatedValue(), 'hh:mm:ss');
                  $end_time   = $this->getExcelTime($objWorksheet->getCellByColumnAndRow(5,$i)->getCalculatedValue(), 'hh:mm:ss');

                  $formated_row =  array(
                                'meeting_name' => $title,
                                'meeting_description' => $description,
                                'meeting_date'        => $date,
                                'venue'               => $venue,
                                'start_at'            => $start_time,
                                'end_at'              => $end_time
                            );

                $saved =  $this->meetingModel->insert($formated_row);

                if($saved)
                    $rowsnow++;
                 
             }

             if($rowsnow>0)
             $alert = "Data imported successfully";
         
           }
          
           unlink(FCPATH.'uploads/'.$file_name); //File Deleted After uploading
           set_flash($alert);
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

        $config['upload_path'] = FCPATH.'uploads/';
        $config['allowed_types'] = 'csv|xls|xlsx';
        $config['max_size']      = 200000;
        $config['file_name']     ="contacts_file";

        //$file_name=$config['file_name'];

       $this->load->library('upload', $config);

       $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('import_file'))
        {
                $alert = $this->upload->display_errors('<p>', '</p>');
        }
        else
        {    
            
            $file_name= $this->upload->data('file_name'); 

            $this->load->library('excel');
            
            $type = PHPExcel_IOFactory::identify('uploads/'.$file_name);
            
            $objReader=PHPExcel_IOFactory::createReader($type);     //For excel 2003 
              //Set to read only
            $objReader->setReadDataOnly(true);          
            //Load excel file
            $objPHPExcel=$objReader->load(strip_tags(FCPATH.'uploads/'.$file_name));    
            
             
            $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
            $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);  
             
            $rowsnow = 0;
             //loop from first data untill last data
             for($i=2;$i<=$totalrows;$i++)
              {

                  $firstname = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                  $lastname  = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                  $gender    = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                  $title     = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                  $email     = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
                  $phone     = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                  $mobile    = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                  $address   = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();

                  $formated_row = array(
                            'firstname'   => $firstname,
                            'lastname'    => $lastname,
                            'gender'      => $gender,
                            'title'       => $title,
                            'email'       => $email,
                            'phone'       => $phone,
                            'mobile'      => $mobile,
                            'address'     => $address
                        );
                
                if($this->input->post('meeting'))
                    $formated_row['meeting'] = $this->input->post('meeting'); 

                $saved =  $this->meetingModel->saveContact($formated_row);

                if($saved)
                    $rowsnow++;
                 
             }

             if($rowsnow>0)
             $alert = "Data imported successfully";
         
           }
          
           unlink(FCPATH.'uploads/'.$file_name); //File Deleted After uploading
           set_flash($alert);
           redirect(site_url('contacts'));
    
    }


    //save Discussion
    public function saveDiscussion(){

        $data = array(
            'meeting_id'   => $this->input->post('meeting'),
            'item_name'    => $this->input->post('topic'),
            'item_details' => $this->input->post('details')
        );


        $this->meetingModel->saveDiscussion($data);
        
        if(!empty($_POST['discussion'])):
            set_flash('Discussion updated successfully');
        else:
            set_flash('Discussion saved successfully');
        endif;
        
        redirect(site_url('meeting/'.$_POST['meeting']));
    }


     public function importDiscussions(){

        $config['upload_path'] = FCPATH.'uploads/';
        $config['allowed_types'] = 'csv|xls|xlsx';
        $config['max_size']      = 200000;
        $config['file_name']     ="contacts_file";

        //$file_name=$config['file_name'];

       $this->load->library('upload', $config);

       $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('import_file'))
        {
                $alert = $this->upload->display_errors('<p>', '</p>');
        }
        else
        {    
            
            $file_name= $this->upload->data('file_name'); 

            $this->load->library('excel');
            
            $type = PHPExcel_IOFactory::identify('uploads/'.$file_name);
            
            $objReader=PHPExcel_IOFactory::createReader($type);     //For excel 2003 
              //Set to read only
            $objReader->setReadDataOnly(true);          
            //Load excel file
            $objPHPExcel=$objReader->load(strip_tags(FCPATH.'uploads/'.$file_name));    
            
             
            $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
            $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);  
             
            $rowsnow = 0;
             //loop from first data untill last data
             for($i=2;$i<=$totalrows;$i++)
              {

                  $topic    = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                  $details  = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();

                  $formated_row = array(
                            'meeting_id'   => $this->input->post('meeting'),
                            'item_name'    => $topic,
                            'item_details' => $details
                        );

                $saved =  $this->meetingModel->saveDiscussion($formated_row);

                if($saved)
                    $rowsnow++;
                 
             }

             if($rowsnow>0)
             $alert = "Data imported successfully";
         
           }
          
           unlink(FCPATH.'uploads/'.$file_name); //File Deleted After uploading
           set_flash($alert);
           redirect(site_url('meeting/'.$_POST['meeting']));
    
    }

    //save Discussion
    public function saveAction(){

        $data = array(
              'meeting_id'   => $this->input->post('meeting'),
              'action_point' => $this->input->post('action'),
          );

        if(!empty( $this->input->post('action_id')))
              $data ['id'] = $this->input->post('action_id');
  
        $this->meetingModel->saveActionPoint($data);
        
        if(!empty($_POST['action_id'])):
            set_flash('Action Point updated successfully');
        else:
            set_flash('Action Point saved successfully');
        endif;
        
        redirect(site_url('meeting/'.$_POST['meeting']));
    }

     public function importActions(){

        $config['upload_path'] = FCPATH.'uploads/';
        $config['allowed_types'] = 'csv|xls|xlsx';
        $config['max_size']      = 200000;
        $config['file_name']     ="contacts_file";

        //$file_name=$config['file_name'];

       $this->load->library('upload', $config);

       $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('import_file'))
        {
                $alert = $this->upload->display_errors('<p>', '</p>');
        }
        else
        {    
            
            $file_name= $this->upload->data('file_name'); 

            $this->load->library('excel');
            
            $type = PHPExcel_IOFactory::identify('uploads/'.$file_name);
            
            $objReader=PHPExcel_IOFactory::createReader($type);     //For excel 2003 
              //Set to read only
            $objReader->setReadDataOnly(true);          
            //Load excel file
            $objPHPExcel=$objReader->load(strip_tags(FCPATH.'uploads/'.$file_name));    
            
             
            $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
            $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);  
             
            $rowsnow = 0;
             //loop from first data untill last data
             for($i=2;$i<=$totalrows;$i++)
              {

                  $action    = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();

                  $formated_row =  array(
                      'meeting_id'   => $this->input->post('meeting'),
                      'action_point' => $action
                  );

                $saved =  $this->meetingModel->saveActionPoint($formated_row);

                if($saved)
                    $rowsnow++;
                 
             }

             if($rowsnow>0)
             $alert = "Data imported successfully";
         
           }
          
           unlink(FCPATH.'uploads/'.$file_name); //File Deleted After uploading
           set_flash($alert);
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

    function getExcelDate($input,$format="Y-m-d"){
       $date = PHPExcel_Shared_Date::ExcelToPHP($input);
        return date($format,$date);
    }

    function getExcelTime($input,$format="hh:mm:ss"){
       return PHPExcel_Style_NumberFormat::toFormattedString($input,$format);
    }
}

