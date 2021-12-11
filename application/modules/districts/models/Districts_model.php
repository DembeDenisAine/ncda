<?php 

class Districts_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_districts");
        return (object)$query->result_array();
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


    public function update($id) 
    {
        $data = array(
            'activity_name' => $this->input->post('activity_name'),
            'activity_description' => $this->input->post('activity_description'),
            'objective_id' => $this->input->post('objective_id'),
            'created_by' => $this->input->post('created_by')
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

    public function district_teams($id)
    {
        $query = $this->db->query('SELECT `bt`.*, `nf`.`facility_name` as `facility_name` 
                                  FROM (`ncda_branch_teams` `bt`) 
                                  JOIN `ncda_facilities` `nf` 
                                  ON `nf`.`id`=`bt`.`facility_id`')
                          ->result_array();
        return (object)$query;

    }

    public function facilities_by_district($id)
    {
        $query = $this->db->query("SELECT * FROM ncda_facilities WHERE  district_id='$id'")
                          ->result_array();
        return (object)$query;


    }

    public function get_facilities(){

        $query = $this->db->get("ncda_facilities");
        return $query->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete('ncda_districts', array('id' => $id));
    }


}

