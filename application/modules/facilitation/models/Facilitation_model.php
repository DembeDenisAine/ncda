<?php 

class Facilitation_model extends CI_Model{

    public function get(){
        $this->db->join('ncda_facilities','ncda_facilities.id=ncda_facilitation.facility_id');
        $query = $this->db->get("ncda_facilitation");
        return $query->result();
    }

    public function insert()
    {    
        $user_id = 1;
        $data = array(
            'facility_id' => $this->input->post('facility_id'),
            'description' => $this->input->post('description'),
            'item_value'  => $this->input->post('value'),
            'activity_id' => $this->input->post('activity_id')
        );

        $id = $this->input->post('id');

        if(!empty($id)){
            $this->db->where('id',$id);
            return $this->db->update('ncda_facilitation',$data);
        }
        
        return $this->db->insert('ncda_facilitation', $data);
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_facilitation', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_facilitation', array('id' => $id));
    }


}

