<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends MX_Controller {

    public function __Construct() {
        
       parent::__Construct();
        $this->user=$this->session->get_userdata();
        $this->load->model('admin_model');
        $this->username=$this->session->userdata['username'];
        $this->user_id=$this->session->userdata['user_id'];
        
    }

    public function showLogs(){

        $data = array(
            'title' => 'User Activity Logs',
            'logs' => $this->admin_model->get_logs(),
            //'username'=>$this->username
        );

        $data['view']='user_logs';
        $data['module']="admin";
        echo Modules::run("templates/main",$data);

    }

    public function clearLogs(){
        
        $this->admin_model->clearLogs();
        
        $this->showLogs();

    }
    

public function groups(){
    
        $data['title']='Groups Management';
        $data['view']='groups';
        $data['module']="admin";
        echo Modules::run("templates/main",$data);
        //$this->load->view('groups', $data);
    
    
}

function groupAllow() {


$data=$this->input->post();
$group=$this->input->post('group');


$permissions=$_POST['permissions']; 

$this->db->where('group_id',$group);
$this->db->delete('aauth_perm_to_group');

foreach($permissions as $permission)

{
   
$this->aauth->create_perm($permission);

$a=$this->aauth->allow_group($group,$permission);
        
}


if($a){
    
echo 'OK';
}
}

function addGroup(){
    
    $postdata=$this->input->post();

    $post=$this->admin_model->addGroup($postdata);
 
   Modules::run("utility/setFlash","<font color='green'>Group Added</font>");
    
    redirect('admin/groups');
}


public function attachments()
{
    $data['title']     = "Company Documents";
    $data['documents'] = $this->admin_model->get_attachments();
    $data['module'] ='admin';
    $data['view'] ='documents';
    render_view($data);
}


//upload downlodables
public function upload_attachments(){

    $res = $this->admin_model->attach_document();

    if($res){

    $this->session->set_flashdata('success', 'Document saved successfully');
     redirect($this->agent->referrer());

    }else{

    $this->session->set_flashdata('danger', 'File upload Failed,try again');
     redirect($this->agent->referrer());
    }

}





}

/* End of file */

