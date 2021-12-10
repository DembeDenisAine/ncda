<?php 

class Districts_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_districts");
        return $query->result();
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


    public function delete($id)
    {
        return $this->db->delete('ncda_districts', array('id' => $id));
    }


}

