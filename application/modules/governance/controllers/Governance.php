<?php

class Governance extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module ="governance";
        $this->load->model("governance_model",'governanceModel'); //board members model
    }

    //get board members list
    public function index(){  

        $page  = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $route = 'board-list';
        $perPage = 15;

         if(!empty($_GET['pdf'])){
            $page = 0;
            $perPage = 5000;
        }

        $data['search'] = $this->input->post('search');

        $count = $this->governanceModel->count_members();
        $data['members'] = $this->governanceModel->get($perPage, $page);

        $data['links'] = paginate($route, $count, $perPage, 2);
        $data['module']=$this->module;
        $data['title']="Board Members";
        $data['view']="board_members";


         if(!empty($_GET['pdf'])):

            $data['view'] = 'members_pdf';
            $html = $this->load->view("templates/pdf",$data,true);
            $filename = "board_".time().".pdf";
            make_pdf($html,$filename,"D",true);
            
        else:
            render_view($data);
        endif;
    }
    
    
    //save members
    public function store() { 

        $this->governanceModel->save();
        set_flash('Member saved successfully');
        return redirect(site_url('board-list'));
    }

    //update members
    public function update($id = null){ 
        $this->governanceModel->update($id);
        set_flash('Member updated successfully');
        return redirect(site_url('board-list'));
    }


     //save mission and vision
    public function about() { 

        if(isset($_POST['mission'])):
            $this->governanceModel->update_about();
            set_flash('Inforamtion Update successfully');
            redirect(site_url('summary'));
        else:
            $data['module']=$this->module;
            $data['title']="Organizational Info";
            $data['view']="about_form";
            render_view($data);
        endif;
    }
 
   

}

