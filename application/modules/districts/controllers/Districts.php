<?php

class Districts extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="districts";
        $this->load->model("districts_model",'DM'); //districts model
            
    }

    public function index(){  //district list
    
        $data['module']=$this->module;
        $data['title']="Districts";
        $data['view']="data";

        $data['districts'] = $this->DM->get();
        echo Modules::run('templates/main',$data);
    }
    

    public function store() { //save district

        $this->DM->insert();
        return redirect(site_url('district-list'));
    }

    public function teams($id){ //get district teams

        $count = $this->DM->district_teams_count($id);

        $page  = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $route = 'teams-district/'.$id;
        $perPage = 3;

        $data['teams'] = $this->DM->district_teams($id, $perPage, $page);
        $data['links'] = paginate($route, $count, $perPage, 3);

        $data['facilities'] = $this->DM->facilities_by_district($id);
        $data['district'] = $this->DM->find($id);
        $data['district_id']=$id;
        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="teams";
        echo Modules::run('templates/main',$data);
    }

    public function create_team($id){ //get district teams

        $district = $this->DM->find($id);
        $data['district'] = $district->district_name;
        $data['district_id']=$id;
        $data['facilities'] = $this->DM->get_facilities($id);
        $data['module']=$this->module;
        $data['title']="Branch Teams //".$district->district_name.": Branch";

        $data['view']="create_teams";
        echo Modules::run('templates/main',$data);
    }

    public function edit_team($id, $district_id){ //edit district teams

        $data['staff'] = $this->DM->single_district_staff($id);
        $district = $this->DM->find($district_id);
        $data['district'] = $district->district_name;
        $data['district_id']=$district_id;
        $data['facilities'] = $this->DM->get_facilities($district_id);
        $data['module']=$this->module;
        $data['title']="Edit Branch Teams //".$district->district_name.": Branch";

        $data['view']="edit_teams";
        echo Modules::run('templates/main',$data);
    }

    public function save_branch_team() { //save team

        $data = $this->DM->insert_district_teams();

        return redirect(site_url('teams-district/'.$data));
    }

    public function update_district_team() { //update team

        $data = $this->DM->update_district_teams();
        return redirect(site_url('teams-district/'.$data));
    }

    
    public function update($id = null){ //updat district

        $this->AM->update($id);
        return redirect(site_url('district-list'));
    }
 
    public function delete($id = null){ //delete district

        $this->AM->delete($id);
        return redirect(site_url('district-list'));
    }  


}

