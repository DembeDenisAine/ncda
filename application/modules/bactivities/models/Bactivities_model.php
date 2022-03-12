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

    
     public function saveData(){

        $activities = $this->input->post('activity');
        $values     = $this->input->post('values');
        $params     = $this->input->post('params');
        $facility   = $this->input->post('facility');

        foreach($activities as $key=>$value){
            
            $rowValues = $values[$key];
            $rowParams = $params[$key];
            $activity = $value;

            $this->saveParameterData($facility,$activity ,$rowValues,$rowParams);
        }
        return true;
    }

     private function saveParameterData($facility,$activityId,$values,$params){

        foreach($values as $key=>$value):
           
            $row = array(
                'parameter_id'    => $params[$key],
                'parameter_value' => $values[$key],
                'facility_id'     => $facility,
                'action_date'     => date('Y-m-d')
            );

            $this->db->insert('ncda_branch_activity_data',$row);

        endforeach;

        return true;
    }

    public function  getParamScore($paramId,$facilityId){

        $this->db->select('parameter_value as score');
        $this->db->where('parameter_id',$paramId);

        if($facilityId)
            $this->db->where('facility_id',$facilityId);

        $this->db->order_by('id','desc');

        $res = $this->db->get('ncda_branch_activity_data')->row();

        return ($res)?$res->score:null;
    }

    
    public function activities_by_objective_id($id) {

        $query = $this->db
                ->query("
                    SELECT `na`.*, `no`.`objective_name` as `objective_name` 
                    FROM (`branch_activities` `na`)
                    JOIN `ncda_objectives` `no` 
                    ON `no`.`id`=`na`.`objective_id` 
                    WHERE `na`.`objective_id` = '$id'")
                ->result();
        return $query;
    } 

 
}

