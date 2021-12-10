<?php 

class Parameters_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_parameters");
        return $query->result();
    }

    public function insert()
    {    
        $user_id = 1;
        $data = array(
            'parameter_name' => $this->input->post('parameter_name'),
            'parameter_description' => $this->input->post('parameter_description'),
            'activity_id' => $this->input->post('activity_id'),
            'created_by'             => $user_id,
        );
        return $this->db->insert('ncda_parameters', $data);
    }


    public function update($id) 
    {
        $user_id = 1;
        $data = array(
            'parameter_name' => $this->input->post('parameter_name'),
            'parameter_description' => $this->input->post('parameter_description'),
            'activity_id' => $this->input->post('activity_id'),
            'created_by'             => $user_id,
        );
        if($id==0){
            return $this->db->insert('ncda_parameters',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_parameters',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_parameters', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_parameters', array('id' => $id));
    }


    public function parameters_with_activities_info() {

        $query = $this->db
                ->query("
                    SELECT `np`.*, `na`.`activity_name` as `activity_name` 
                    FROM (`ncda_parameters` `np`) 
                    JOIN `ncda_activities` `na` 
                    ON `na`.`id`=`np`.`activity_id`")
                ->result_array();

        return (object)$query;
    } 

    public function parameters_by_activity_id($id) {

        $query = $this->db
                 ->query("
                    SELECT `np`.*, `na`.`activity_name` as `activity_name` 
                    FROM (`ncda_activities` `na`) 
                    JOIN `ncda_parameters` `np` 
                    ON `na`.`id`=`np`.`activity_id` 
                    WHERE `np`.`activity_id` = '$id'")
                ->result_array();
        return (object)$query;

    } 


}

