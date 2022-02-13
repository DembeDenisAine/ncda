<?php 

class Objectives_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_objectives");
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
        return $this->db->insert('ncda_objectives', $data);
    }


    public function update() 
    {
        $user_id = 1; 
        $data = array(
            'objective_name' => $this->input->post('objective_name'),
            'objective_description' => $this->input->post('objective_description'),
            'project_id'    => $this->input->post('project_id'),
            'created_by'    => $user_id
        );

        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('ncda_objectives',$data);      
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_objectives', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_objectives', array('id' => $id));
    }


    public function objectives_with_project_info() {

        $result = $this->db->query('SELECT `no`.*, `np`.`project_name` as `project_name` 
                                  FROM (`ncda_objectives` `no`) 
                                  JOIN `ncda_projects` `np` 
                                  ON `np`.`id`=`no`.`project_id`')
                          ->result();
        return $result;

    } 

    public function objectives_by_project_id($id,$perPage=null,$page=null) {

        if($perPage)
        $this->db->limit($perPage,$page);
        
        $result = $this->db->query("SELECT `no`.*, `np`.`project_name` as `project_name` 
                                  FROM (`ncda_objectives` `no`) 
                                  JOIN `ncda_projects` `np` 
                                  ON `np`.`id`=`no`.`project_id` 
                                  WHERE `no`.`project_id` = '$id'")
                            ->result();
        return $result;

    } 

    public function countObjects($id){
        $this->db->where('project_id',$id);
        return $this->db->get('ncda_objectives')->num_rows();
    }


}

