<?php 

class Bparameters_model extends CI_Model{

    public function get(){

        $query = $this->db->get("branch_activty_parameters");
        return $query->result();
    }

    public function insert()
    {    
        $user_id = 1;
        $data = array(
            'parameter_name' => $this->input->post('parameter_name'),
            'parameter_description' => $this->input->post('parameter_description'),
            'target_value'           => $this->input->post('target'),
            'activity_id' => $this->input->post('activity_id')
        );
        return $this->db->insert('branch_activty_parameters', $data);
    }


    public function update() 
    {
        $user_id = 1;
        $id = $this->input->post('id');
        $data = array(
            'parameter_name' => $this->input->post('parameter_name'),
            'parameter_description' => $this->input->post('parameter_description'),
            'activity_id'           => $this->input->post('activity_id'),
            'target_value'           => $this->input->post('target'),
            'updated_at'            => date('Y-m-d'),
        );
        
        $this->db->where('id',$id);
        return $this->db->update('branch_activty_parameters',$data);
                 
    }


    public function find($id)
    {
        return $this->db->get_where('branch_activty_parameters', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('branch_activty_parameters', array('id' => $id));
    }


    public function parameters_by_activity_id($id) {

        $result = $this->db
                 ->query("
                    SELECT `np`.*, `na`.`activity_name` as `activity_name` 
                    FROM (`branch_activities` `na`) 
                    JOIN `branch_activty_parameters` `np` 
                    ON `na`.`id`=`np`.`activity_id` 
                    WHERE `np`.`activity_id` = '$id'")
                ->result();
        return $result;

    } 


}

