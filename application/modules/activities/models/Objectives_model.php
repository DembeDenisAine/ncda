<?php 

class Activities_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_activities");
        return $query->result();
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_ojectives', array('id' => $id))->row();
    }

    public function objectives_with_project_info() {

        $builder = $this->db->table('ncda_ojectives as no');
        $builder->select('no.*, np.project_name as project_name');
        $builder->join('ncda_projects as np', 'no.project_id = np.id');
        $data = $builder->get()->getResult();
        return $data;

    } 

    public function objectives_by_project_id($id) {

        $builder = $this->db->table('ncda_ojectives as no');
        $builder->select('no.*, np.project_name as project_name');
        $builder->join('ncda_projects as np', 'no.project_id = np.id');
        $builder->where('no.project_id',$id);
        $data = $builder->get()->getResult();
        return $data;

    } 

}


