<?php 

class Objectives_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_ojectives");
        return $query->result();
    }


    public function insert()
    {   
        $user_id = 1; 
        $data = array(
            'objective_name' => $this->input->post('objective_name'),
            'objective_description' => $this->input->post('objective_description'),
            'project_id'    => $this->input->post('project_id'),
            'created_by'             => $user_id
        );
        return $this->db->insert('ncda_ojectives', $data);
    }


    public function update($id) 
    {
        $user_id = 1; 
        $data = array(
            'objective_name' => $this->input->post('objective_name'),
            'objective_description' => $this->input->post('objective_description'),
            'project_id'    => $this->input->post('project_id'),
            'created_by'             => $user_id
        );

        if($id==0){
            return $this->db->insert('ncda_ojectives',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_ojectives',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_ojectives', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_ojectives', array('id' => $id));
    }


    public function objectives_with_project_info() {

        $this->db->table('ncda_ojectives as no');
        $this->db->select('no.*, np.project_name as project_name');
        $this->db->join('ncda_projects as np', 'no.project_id = np.id');
        $data = $this->db->get('ncda_ojectives as no');
        return $data;

    } 

    public function objectives_by_project_id($id) {

        $this->db->select('no.*, np.project_name as project_name');
        $this->db->join('ncda_projects as np', 'no.project_id = np.id');
        $this->db->where('no.project_id',$id);
        $data = $this->db->get('ncda_ojectives as no');
        return $data;

    } 


}

