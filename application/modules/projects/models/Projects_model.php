<?php 

class Projects_model extends CI_Model{

    public function get($perPage,$page){
        
        $this->db->limit($perPage,$page);
        $this->db->order_by('id','desc');
        $query = $this->db->get("ncda_projects");
        return $query->result();
    }

    public  function countProjects(){
        return $this->db->count_all('ncda_projects');
    }

    public function insert()
    {    
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $diff     = strtotime($start_date) - strtotime($end_date);
        $duration = ceil(abs($diff / 86400)).' days';

        $data = array(
            'project_name' => $this->input->post('project_name'),
            'project_description' => $this->input->post('project_description'),
            'budget' => $this->input->post('budget'),
            'currency' => $this->input->post('currency'),
            'status' => $this->input->post('status'),
            'start_date'    => $start_date,
            'end_date'      => $end_date,
            'duration'      => $duration
        );

        return $this->db->insert('ncda_projects', $data);
    }


    public function update($id) 
    {
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $diff = strtotime($start_date) - strtotime($end_date);
        $duration = ceil(abs($diff / 86400)).' days';

        $data = array(
            'project_name' => $this->input->post('project_name'),
            'project_description' => $this->input->post('project_description'),
            'budget'        => $this->input->post('budget'),
            'currency'      => $this->input->post('currency'),
            'status' => $this->input->post('status'),
            'start_date'    => $start_date,
            'end_date'      => $end_date,
            'duration'      => $duration,
            'updated_at'     => date('Y-m-d')
        );

        if($id==0){
            return $this->db->insert('ncda_projects',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_projects',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_projects', array('id' => $id))->row();
    }

    public function delete($id)
    {
        return $this->db->delete('ncda_projects', array('id' => $id));
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

    //count Active projects 
    public  function countActiveProjects(){
        return $this->db->where('status','Active')->get('ncda_projects')->num_rows();
    }

    //count Completed projects 
    public  function countCompletedProjects(){
        return $this->db->where('status','Completed')->get('ncda_projects')->num_rows();
    }


    public function getTopFive(){
        
        $this->db->limit(5);
        return $this->db->order_by('id','desc')->get("ncda_projects")->result();
    }
  
    private function saveParameterData($facility,$activityId,$values,$params){

        foreach($values as $key=>$value):
           
            $row = array(
                'parameter_id'    => $params[$key],
                'parameter_value' => $values[$key],
                'facility_id'     => $facility,
                'action_date'     => date('Y-m-d')
            );

            $this->db->insert('ncda_field_activity_data',$row);

        endforeach;

        return true;
    }

    public function  getParamScore($paramId,$facilityId){

        $this->db->select('parameter_value as score');
        $this->db->where('parameter_id',$paramId);

        if($facilityId)
            $this->db->where('parameter_id',$paramId);

        $res = $this->db->get('ncda_field_activity_data')->row();

        return ($res)?$res->score:null;
    }


}

