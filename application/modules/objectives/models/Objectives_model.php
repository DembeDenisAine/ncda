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

        $query = $this->db->query('SELECT `no`.*, `np`.`project_name` as `project_name` 
                                  FROM (`ncda_ojectives` `no`) 
                                  JOIN `ncda_projects` `np` 
                                  ON `np`.`id`=`no`.`project_id`')
                          ->result_array();
        return (object)$query;

    } 


    public function objectives_by_project_id($id) {

        $query = $this->db->query('SELECT `no`.*, `np`.`project_name` as `project_name` 
                                  FROM (`ncda_ojectives` `no`) 
                                  JOIN `ncda_projects` `np` 
                                  ON `np`.`id`=`no`.`project_id` 
                                  WHERE `no`.`project_id` = 1')
                            ->result_array();
        return (object)$query;

    } 


}

