<?php 

class Districts_model extends CI_Model{

    public function get($limit=null, $start=null){


        $search = $this->input->post('search');


        if(!empty($search)){
            $this->db->like('district_name',$search);
            $this->db->or_like('region',$search);
        }
            

        $this->db->limit($limit,$start);
        $query = $this->db->get("ncda_districts")->result();
        return $query;
        
    }


    public function insert()
    {    
        $data = array(
            'district_name' => $this->input->post('district_name'),
            'region' => $this->input->post('region'),
            'notes' => $this->input->post('notes'),
            'active' => $this->input->post('active')
        );
        return $this->db->insert('ncda_districts', $data);
    }

    public function district_count()
    {   
        $query = $this->db->get('ncda_districts')->num_rows();
        return $query;
    }


    public function update($id) 
    {
        $data = array(
            'district_name' => $this->input->post('activity_name'),
            'region' => $this->input->post('region'),
            'notes' => $this->input->post('notes'),
            'active' => $this->input->post('active')
        );
        if($id==0){
            return $this->db->insert('ncda_districts',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_districts',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_districts', array('id' => $id))->row();
    }

    public function delete($id)
    {
        $facility = $this->db->get_where('ncda_facilities', array('district_id' => $id))->num_rows();
        $branch_teams = $this->db->get_where('ncda_branch_teams', array('district_id' => $id))->num_rows();

        if($facility > 0){
            $data['status'] = false;
            $data['msg'] = "You can not perform this operation, This branch has some Facility info. associated to it";
            return $data;

        }else{

            return $this->db->delete('ncda_districts', array('id' => $id));
            $data['status'] = true;
            $data['msg'] = " Branch deleted Successfully";
            return $data;
        }
        
    }

    public function district_teams($id, $limit=null, $start=null)
    {   
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                        FROM (`ncda_branch_teams` `bt`) 
                        LEFT JOIN `ncda_facilities` `nf` 
                        ON `nf`.`id`=`bt`.`facility_id`
                        WHERE `bt`.`district_id`=$id LIMIT $start,$limit")->result_array();
        return (object)$query;

    }

    public function single_district_staff($id)
    {  
        $query = $this->db->query("SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                        FROM (`ncda_branch_teams` `bt`) 
                        LEFT JOIN `ncda_facilities` `nf` 
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


    //count Active Branches 
    public  function countActiveBranches(){
        return $this->db->where('active',1)->get('ncda_districts')->num_rows();
    }

    //search like
    public function search_districts($string, $limit=null, $start=null)
    {   
        $query = $this->db->query("SELECT * FROM ncda_districts
                            WHERE district_name LIKE '%$string%'
                            OR region LIKE '%$string%'
                            LIMIT $start,$limit
                        ")->result_array();
        return $query;
  
    }

    public function count_all_districts_searches($string)
    {   
        $query = $this->db->query("SELECT * FROM ncda_districts
                    WHERE district_name LIKE '%$string%'
                    OR region LIKE '%$string%'
                ")->num_rows();
        return $query;
    }

    public function insert_district_batch($data){
        return $this->db->insert_batch('ncda_districts',$data);
    }

}

