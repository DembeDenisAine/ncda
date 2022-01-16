<?php

class Districts extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="districts";
        $this->load->model("districts_model",'DM'); //districts model
            
    }

    //get district list
    public function index(){  

        $count = $this->DM->district_count();

        $page  = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $route = 'district-list';
        $perPage = 10;

        $data['links'] = paginate($route, $count, $perPage, 2);
    
        $data['module']=$this->module;
        $data['title']="Districts";
        $data['view']="data";

        $data['districts'] = $this->DM->get($perPage, $page);
        echo Modules::run('templates/main',$data);
    }
    

    //save district
    public function store() { 

        $this->DM->insert();
        return redirect(site_url('district-list'));
    }

    //updat district
    public function update($id = null){ 

        $this->DM->update($id);
        return redirect(site_url('district-list'));
    }
 
    //delete district
    public function delete($id = null){ 

        $this->DM->delete($id);
        return redirect(site_url('district-list'));
    }  

// >>>>>>>>>>>>>>> END OF BRANCH (DISTRICT) OPERATIONS <<<<<<<<<<<<<<<<<<<<<<<<



// >>>>>>>>>>>>>>> BRANCH (DISTRICT) TEAM OPERATIONS <<<<<<<<<<<<<<<<<<<<<<<<<<

     //create district teams - form
    public function create_team($id){

        $district = $this->DM->find($id);
        $data['district'] = $district->district_name;
        $data['district_id']=$id;
        $data['facilities'] = $this->DM->get_facilities($id);
        $data['module']=$this->module;
        $data['title']="Branch Teams //".$district->district_name.": Branch";

        $data['view']="create_teams";
        echo Modules::run('templates/main',$data);
    }

    //save team
    public function save_branch_team() { 

        $data = $this->DM->insert_district_teams();

        return redirect(site_url('teams-district/'.$data));
    }

    //get district teams
    public function get_teams($id){ 

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

    //edit district team - form
    public function edit_team($id, $district_id){ 

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

    //update team
    public function update_district_team() {  

        $data = $this->DM->update_district_teams();
        return redirect(site_url('teams-district/'.$data));
    }

    //update team
    public function delete_district_team($id, $district_id) {  
        $district = $district_id;
        $this->DM->delete_district_staff($id);
        return redirect(site_url('teams-district/'.$district));
    }
    


}

