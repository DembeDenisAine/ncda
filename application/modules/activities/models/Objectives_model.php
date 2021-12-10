<?php 

class Objectives_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_ojectives");
        return $query->result();
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_ojectives', array('id' => $id))->row();
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

        $query = $this->db->query("SELECT `no`.*, `np`.`project_name` as `project_name` 
                                  FROM (`ncda_ojectives` `no`) 
                                  JOIN `ncda_projects` `np` 
                                  ON `np`.`id`=`no`.`project_id` 
                                  WHERE `no`.`project_id` = '$id'")
                            ->result_array();
        return (object)$query;

    } 



}


