<?php

class Teams extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="teams";
        $this->load->model("districts/districts_model",'DM'); //districts model
        $this->load->model("facilities/facilities_model",'FM'); //districts model
        $this->load->model("teams_model",'teams'); //teams model
        
    }

//>>>>>>>>>>>>>>>>>>>>>>>>>TEAM INFORMATION BY BRANCHES - DISTRICTS


    //get branch teams
    public function get_all_teams(){ 

        $page  = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $route = 'contacts-list';
        $perPage = 5;

        $searched_string = $this->input->post('search');
        //print_r($searched_string);
        //exit();

        if(isset($searched_string)){
            $count = $this->teams->count_all_team_searches($searched_string);
            $data['teams'] = $this->teams->search_branch_staff($searched_string, $perPage, $page);

        }
       /* else{
            $count = $this->teams->count_all_teams();
            $data['teams'] = $this->teams->get_teams($perPage, $page);
        } */

        $data['links'] = paginate($route, $count, $perPage, 2);
        $data['module']=$this->module;
        $data['title']="Branch/Facility/Medical Teams";

        $data['view']="teams";
        echo Modules::run('templates/main',$data);
    }





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

    //save branch team

   /* public function save_branch_team() { 

        $data = $this->DM->insert_district_teams();

        return redirect(site_url('teams-district/'.$data));
    } */

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
    


//>>>>>>>>>>>>>>>>>>>>>>>>>TEAM INFORMATION BY FACILITIES

//get facility teams
public function facility_teams($id){ 

    $data['teams'] = $this->FM->teams_by_facility($id);
    $fac = $this->FM->facility_by_id($id);
    $data['facility'] = $fac->facility_name;
    $data['district'] = $fac->district_name;
    $data['district_id'] = $fac->district_id;
    $data['facility_id'] = $fac->id;

    $data['module']=$this->module;
    $data['title']="Branch Teams";

    $data['view']="teams";
    echo Modules::run('templates/main',$data);
}

//create teams - form
public function create_facility_team($id = null){ 

    $fac = $this->FM->facility_by_id($id);
    $data['facility'] = $fac->facility_name;
    $data['district_id'] = $fac->district_id;
    $data['facility_id'] = $fac->id;

    $data['module']=$this->module;
    $data['title']="Branch Teams";

    $data['view']="create-team";
    echo Modules::run('templates/main',$data);
}

//save team
public function save_branch_team() { 

    $this->DM->insert_district_teams();
    return redirect(site_url('district-list'));
}





}

