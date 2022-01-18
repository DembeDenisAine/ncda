<?php 

class Teams_model extends CI_Model{


    public function get_teams($limit=null, $start=null)
    {   
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                        FROM (`ncda_branch_teams` `bt`) 
                        JOIN `ncda_facilities` `nf` 
                        ON `nf`.`id`=`bt`.`facility_id`
                        LIMIT $start,$limit")->result_array(); 
        return (object)$query;
        //LEFT JOIN `ncda_districts` `nd` ON `nd`.`id`=`nf`.`district_id`
    }

    public function count_all_teams()
    {   
        $query = $this->db->get('ncda_branch_teams')->num_rows();
        return $query;
    }


    public function get($limit=null, $start=null){

        $query = $this->db->query("SELECT * FROM ncda_districts LIMIT $start,$limit")->result_array();
        return (object)$query;
        
    }

    public function find($id)
    {
        return $this->db->get_where('ncda_districts', array('id' => $id))->row();
    }

    public function district_teams($id, $limit=null, $start=null)
    {   
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                        FROM (`ncda_branch_teams` `bt`) 
                        JOIN `ncda_facilities` `nf` 
                        ON `nf`.`id`=`bt`.`facility_id`
                        WHERE `bt`.`district_id`=$id LIMIT $start,$limit")->result_array();
        return (object)$query;

    }

    public function single_district_staff($id)
    {  
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                        FROM (`ncda_branch_teams` `bt`) 
                        JOIN `ncda_facilities` `nf` 
                        ON `nf`.`id`=`bt`.`facility_id`
                        WHERE `bt`.`id`=$id")->row();
        return (object)$query;

    }

    public function district_teams_count($id)
    {   
        $query = $this->db->where('district_id', $id)->get('ncda_branch_teams')->num_rows();
        return $query;
    }

    public function facilities_by_district($id)
    {
        $query = $this->db->query("SELECT * FROM ncda_facilities WHERE district_id='$id'")
                          ->result_array();
        return (object)$query;

    }

    public function get_facilities($id){

        $query = $this->db->where('district_id',$id)->get("ncda_facilities");
        return $query->result_array();
    }

    public function insert_district_teams()
    {    
        $data = array(
            'facility_id' => $this->input->post('facility_id'),
            'first_name' => $this->input->post('first_name'),
            'district_id' => $this->input->post('district_id'),
            'last_name' => $this->input->post('last_name'),
            'title' => $this->input->post('title'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'contact' => $this->input->post('contact'),
            'notes' => $this->input->post('notes'),
        );
        $this->db->insert('ncda_branch_teams', $data);

        $last_id = $this->db->insert_id();
        $res = $this->db->get_where('ncda_branch_teams', array('id' => $last_id))->row();
        $district = $res->district_id;
        return $district;
    }


    public function update_district_teams()
    {   
        $district_id = $this->input->post('district_id');
        $data = array(
            'facility_id' => $this->input->post('facility_id'),
            'first_name' => $this->input->post('first_name'),
            'district_id' => $district_id,
            'last_name' => $this->input->post('last_name'),
            'title' => $this->input->post('title'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'contact' => $this->input->post('contact'),
            'notes' => $this->input->post('notes'),
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('ncda_branch_teams', $data);
        $updated_status = $this->db->affected_rows();

        if($updated_status){
            return $district_id ;
        }else{
            return false;
        }
            
    }

    public function delete_district_staff($id)
    {   
        return $this->db->delete('ncda_branch_teams', array('id' => $id));
  
    }

    

}

