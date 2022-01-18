<?php 

class Bactivities_model extends CI_Model{

    public function get(){
        $query = $this->db->get("branch_activities");
        return $query->result();
    }

    public function insert()
    {    
        $data = array(
            'activity_name' => $this->input->post('activity_name'),
            'activity_description' => $this->input->post('activity_description')
        );

        $id = $this->input->post('id');

        if(empty($id)){
            return $this->db->insert('branch_activities',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('branch_activities',$data);
        }   
    }


    public function find($id)
    {
        return $this->db->get_where('branch_activities', array('id' => $id))->row();
    }

    public function delete($id)
    {
        return $this->db->delete('branch_activities', array('id' => $id));
    }

 
}

