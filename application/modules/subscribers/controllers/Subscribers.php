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

        $data['subscribers'] = $this->subscribersModel->get($perPage,$page);
        $data['links']    = paginate('subscribers/',$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Our Subscribers";
        $data['view']   = "subscribers";

        echo Modules::run('templates/main',$data);
    }
    
    public function save_subscriber() { //save objective

        $this->subscribersModel->save();
        set_flash('Subscriber saved successfully');
        $redirect_route = 'subscribers';
        return redirect(site_url($redirect_route ));
    }


    public function subscriber($id = null){ //show single member

        $data['subscriber'] = $this->subscribersModel->find($id);
        $data['module'] = $this->module;
        $data['title']  = "Subscriber Profile";
        $data['view']   = "subscriber_profile";

        echo Modules::run('templates/main',$data);
    }

    public function update_subscriber(){
         //update subscriber
        $this->subscribersModel->update($this->input->post('id'));
        set_flash('Subscriber updated successfully');
        $redirect_route = (!isset($_POST['is_profile']))?'subscribers':'subscriber/'.$this->input->post('subscriber_id');
       
        return redirect($redirect_route);
    }
 
    public function delete($id = null){ //delete objective
        $this->subscribersModel->delete($id);
        return redirect(site_url('subscribers'));
    }  


}

