<?php 

class Activities_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_activities");
        return $query->result();
    }


    public function insert()
    {    
        $data = array(
            'activity_name' => $this->input->post('activity_name'),
            'activity_description' => $this->input->post('activity_description'),
            'objective_id' => $this->input->post('objective_id'),
            'created_by' => $this->input->post('created_by')
        );
        return $this->db->insert('ncda_activities', $data);
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
            return $this->db->insert('ncda_activities',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_activities',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_activities', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_activities', array('id' => $id));
    }


    public function activities_with_objectives_info() {

         $query = $this->db->query("SELECT `na`.*, `no`.`objective_name` as `objective_name` 
                                  FROM (`ncda_activities` `na`) 
                                  JOIN `ncda_ojectives` `no` 
                                  ON `no`.`id`=`na`.`objective_id`")
                            ->result_array();

        return (object)$query;
    } 

    public function activities_by_objective_id($id) {

        $query = $this->db->query("SELECT `na`.*, `no`.`objective_name` as `objective_name` 
                                  FROM (`ncda_activities` `na`) 
                                  JOIN `ncda_ojectives` `no` 
                                  ON `no`.`id`=`na`.`objective_id` 
                                  WHERE `na`.`objective_id` = '$id'")
                            ->result_array();
        return (object)$query;
    } 

}

