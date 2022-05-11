<?php

class Facilities extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="facilities";
        $this->load->model("districts_model",'DM'); //Districts model
        $this->load->model("facilities_model",'FM'); //Facilities model
            
    }

    // get facilities
    public function index($id = false)
    {   

        if(!empty($id)){  // with a branch
            $data['facilities'] = $this->FM->facilities_by_district($id);
            $data['districts']  = $this->DM->get();

            $district = $this->DM->find($id);
            $data['district']    = $district->district_name;
            $data['district_id'] = $id;

        }else{ // with no branch
            $data['district']    = '';
            $data['district_id'] = '';
            $data['districts']   = $this->DM->get();
            $data['facilities']  = $this->FM->facilities_with_district_info();
        }
        
        $data['module'] = $this->module;
        $data['search'] = $this->input->post('search');
        $data['title']  =  "Facilities ".((!empty($data['district']))?@$data['district']['district_name']:'');
        $data['view']   = "data";

         if(!empty($_GET['pdf'])):

            $data['view'] = 'pdf_facilities';
            $html = $this->load->view("templates/pdf",$data,true);
            $filename = "facilities_".time().".pdf";
            make_pdf($html,$filename,"D",true);
            
        else:
            render_view($data);
        endif;

    }
    
    //save facility
    public function create() { 

        $district = $this->FM->insert();
        return redirect(site_url('facility-list/'.$district));
    }

    //Edit facility  -form
    public function singleFacility($id = null){ 

        $data['facility'] = $this->FM->find($id);
        $data['districts'] =  $this->DM->find($id);

        $data['module']=$this->module;
        $data['title']="Facility";

        $data['view']="edit";
        render_view($data);
    }

    //update facility
    public function update($id = null){ 

        $district = $this->FM->update($id);
        return redirect(site_url('facility-list/'.$district));
    }
 
    
    //delete facility
    public function delete($id = null, $district){ 

        $this->FM->delete($id);
        return redirect(site_url('facility-list/'.$district));
    }  

    public function facility_teams($id){ //get facility teams

        $data['search'] = $this->input->post('search');

        $data['teams'] = $this->FM->teams_by_facility($id);
        $fac = $this->FM->facility_by_id($id);
        $data['facility'] = $fac->facility_name;
        $data['district'] = $fac->district_name;
        $data['district_id'] = $fac->district_id;
        $data['facility_id'] = $fac->id;

        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="teams";

         if(!empty($_GET['pdf'])):

            $data['view'] = 'pdf_teams';
            $html = $this->load->view("templates/pdf",$data,true);
            $filename = "teams_".time().".pdf";
            make_pdf($html,$filename,"D",true);
            
        else:
            render_view($data);
        endif;
    }

    public function create_team($id = null){ //get facility teams

        $fac = $this->FM->facility_by_id($id);
        $data['facility'] = $fac->facility_name;
        $data['district_id'] = $fac->district_id;
        $data['facility_id'] = $fac->id;

        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="create-team";
        render_view($data);
    }


    public function save_branch_team() { //save team

        $this->DM->insert_district_teams();
        return redirect(site_url('district-list'));
    }




}
