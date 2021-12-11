<?php 

class Facilities_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_facilities");
        return $query->result_array();
    }


    public function insert()
    {    
        $data = array(
            'facility_name' => $this->input->post('facility_name'),
            'facilty_description' => $this->input->post('facilty_description'),
            'facility_head' => $this->input->post('facility_head'),
            'district_id' => $this->input->post('district_id')
        );
        return $this->db->insert('ncda_facilities', $data);
    }


    public function update($id) 
    {
        $data = array(
            'facility_name' => $this->input->post('facility_name'),
            'facilty_description' => $this->input->post('facilty_description'),
            'facility_head' => $this->input->post('facility_head'),
            'district_id' => $this->input->post('district_id')
        );
        if($id==0){
            return $this->db->insert('ncda_facilities',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_facilities',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_facilities', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_facilities', array('id' => $id));
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


}

