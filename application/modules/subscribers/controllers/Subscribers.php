<?php

class Subscribers extends MX_Controller
{

    public  function __construct(){

        parent:: __construct();
        $this->module="subscribers";
        $this->load->model("subscribers_model",'subscribersModel'); //teams model
        
    }

    public function index()
    {   
        $count   = $this->subscribersModel->count_subscribers();
        $page    = ($this->uri->segment(3))?$this->uri->segment(3):0;
        $perPage = 12;

        if(!empty($_GET['pdf'])){
            $page = 0;
            $perPage = 5000;
        }

        $data['search'] = $this->input->post('search');

        $data['subscribers'] = $this->subscribersModel->get($perPage,$page);
        $data['links']    = paginate('subscribers/',$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Member Organizations";

        if(!empty($_GET['pdf'])):

            $data['view'] = 'pdf_subscribers';
            $html = $this->load->view("templates/pdf",$data,true);
            $filename = "stakeholders_".time().".pdf";
            make_pdf($html,$filename,"D",true);
            
        else:
            $data['view']   = "subscribers";
            render_view($data);
        endif;
    }
    
    public function save_subscriber() { //save objective

        $this->subscribersModel->save();
        set_flash('Member saved successfully');
        $redirect_route = 'subscribers';
        return redirect(site_url($redirect_route ));
    }


    public function subscriber($id = null){ //show single member

        $data['subscriber'] = $this->subscribersModel->find($id);
        $data['membership'] = $this->subscribersModel->subscriber_membership($id);
        $data['current_membership'] = $this->subscribersModel->current_membership($id);
        $data['module'] = $this->module;
        $data['title']  = "Member Profile";
        $data['view']   = "subscriber_profile";
        render_view($data);
    }

    public function update_subscriber(){
         //update subscriber
        $this->subscribersModel->update();
        set_flash('Member updated successfully');
        $redirect_route = (!isset($_POST['is_profile']))?'subscribers':'subscriber/'.$this->input->post('subscriber_id');
       
        return redirect($redirect_route);
    }
 
    public function delete($id = null){ //delete objective
        $this->subscribersModel->delete($id);
        return redirect(site_url('subscribers'));
    } 

    public function save_membership(){
         $this->subscribersModel->save_membership($this->input->post('id'));
         set_flash('membership saved successfully');
        return redirect(site_url('subscriber/'.$_POST['subscriber_id']));
    } 


}

