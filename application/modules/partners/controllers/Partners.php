<?php

class Partners extends MX_Controller
{

    public  function __construct(){

        parent:: __construct();
        $this->module="partners";
        $this->load->model("partners_model",'partnersModel'); //teams model
        
    }

    public function index()
    {   
        $count   = $this->partnersModel->count_partners();
        $page    = ($this->uri->segment(3))?$this->uri->segment(3):0;
        $perPage = 12;

        $data['partners'] = $this->partnersModel->get($perPage,$page);
        $data['links']    = paginate('partners/',$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Our Partners";
        $data['view']   = "partners";

        echo Modules::run('templates/main',$data);
    }
    
    public function save_partner() { //save objective

        $this->partnersModel->save();
        set_flash('Partner saved successfully');
        $redirect_route = 'partners';
        return redirect(site_url($redirect_route ));
    }


    public function partner($id = null){ //show single member

        $data['partner'] = $this->partnersModel->find($id);
        $data['module'] = $this->module;
        $data['title']  = "Partner Profile";
        $data['view']   = "partner_profile";

        echo Modules::run('templates/main',$data);
    }

    public function update_partner(){
         //update partner
        $this->partnersModel->update($this->input->post('id'));
        set_flash('Partner updated successfully');
        $redirect_route = (!isset($_POST['is_profile']))?'partners':'partner/'.$this->input->post('partner_id');
       
        return redirect($redirect_route);
    }
 
    public function delete($id = null){ //delete objective
        $this->partnersModel->delete($id);
        return redirect(site_url('partners'));
    }  


}

