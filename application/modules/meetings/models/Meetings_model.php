<?php 

class Meetings_model extends CI_Model{

    public function get(){
        $query = $this->db->get("ncda_meetings");
        return $query->result();
    }


    public function insert()
    {   
        $user_id = 1; 

        $data = array(
            'meeting_name'        => $this->input->post('meeting_name'),
            'meeting_description' => $this->input->post('meeting_description'),
            'meeting_date'        => $this->input->post('meeting_date'),
            'venue'               => $this->input->post('venue'),
            'start_at'            => $this->input->post('start_time'),
            'end_date'            => $this->input->post('end_time')
        );

        return $this->db->insert('ncda_meetings', $data);
    }


    public function update($id) 
    {
        $user_id = 1; 

        $data = array(
            'meeting_name' => $this->input->post('meeting_name'),
            'meeting_description' => $this->input->post('meeting_description'),
            'meeting_date'        => $this->input->post('meeting_date'),
            'venue'               => $this->input->post('venue'),
            'start_at'               => $this->input->post('start_time'),
            'end_date'               => $this->input->post('end_time')
        );

        if($id==0){
            return $this->db->insert('ncda_meetings',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_meetings',$data);
        }        
    }


    public function find($id)
    {
        return $this->db->get_where('ncda_meetings', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('ncda_meetings', array('id' => $id));
    }

    //meeting attendants
    public function getAttendants($id){

        return $this->db->get_where('ncda_meeting_participants', array('meeting_id' => $id))->row();
    }


    //meeting impacts
    public function getImpacts($id){
        
        return $this->db->get_where('ncda_meeting_impacts', array('meeting_id' => $id))->row();
    }

    //meeting discussions
    public function getDiscussions($id){
        return $this->db->get_where('ncda_meeting_discusions', array('meeting_id' => $id))->row();
    }

    //meeting discussions
    public function getActionPoints($id){
        return $this->db->get_where('ncda_meeting_action_points', array('meeting_id' => $id))->row();
    }





}

