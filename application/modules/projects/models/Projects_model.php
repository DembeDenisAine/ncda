<?php 

class Projects_model extends CI_Model{

    public function get(){

        $query = $this->db->get("ncda_projects");
        return $query->result();
    }


    public function insert()
    {    
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $diff = strtotime($start_date) - strtotime($end_date);
        $duration = ceil(abs($diff / 86400)).' days';

        $data = array(
            'project_name' => $this->input->post('project_name'),
            'project_description' => $this->input->post('project_description'),
            'budget' => $this->input->post('budget'),
            'currency' => $this->input->post('currency'),
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
            'budget' => $this->input->post('budget'),
            'currency' => $this->input->post('currency'),
            'start_date'    => $start_date,
            'end_date'      => $end_date,
            'duration'      => $duration
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


}

