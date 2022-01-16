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
            'meeting_name' => $this->input->post('title'),
            'meeting_description' => $this->input->post('description'),
            'meeting_date'        => $this->input->post('date'),
            'venue'               => $this->input->post('venue'),
            'start_at'            => $this->input->post('start_time'),
            'end_at'              => $this->input->post('end_time')
        );

        return $this->db->insert('ncda_meetings', $data);
    }


    public function update($id) 
    {
        $user_id = 1; 

        $data = array(
            'meeting_name' => $this->input->post('meeting_title'),
            'meeting_description' => $this->input->post('description'),
            'meeting_date'        => $this->input->post('meeting_date'),
            'venue'               => $this->input->post('venue'),
            'start_at'            => $this->input->post('start_time'),
            'end_at'              => $this->input->post('end_time')
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
                $this->db->join('ncda_contact_catalog',
                'ncda_contact_catalog.id = ncda_meeting_participants.contact_id');
        return $this->db->get_where('ncda_meeting_participants', array('meeting_id' => $id))->result();
    }

    //contacts
    public function getContacts(){
        return $this->db->get('ncda_contact_catalog')->result();
    }

    //meeting impacts
    public function getImpacts($id){
        
        return $this->db->get_where('ncda_meeting_impacts', array('meeting_id' => $id))->result();
    }

    //meeting discussions
    public function getDiscussions($id){
        return $this->db->get_where('ncda_meeting_discusions', array('meeting_id' => $id))->result();
    }

    //meeting discussions
    public function getActionPoints($id){
        return $this->db->get_where('ncda_meeting_action_points', array('meeting_id' => $id))->result();
    }

    //save contact
    public function saveContact()
    {   
        $user_id = 1; 

        $data = array(
            'first_name'  => $this->input->post('firstname'),
            'last_name'   => $this->input->post('lastname'),
            'gender'      => $this->input->post('gender'),
            'title'       => $this->input->post('title'),
            'represents'  => $this->input->post('organization'),
            'email'       => $this->input->post('email'),
            'phone'       => $this->input->post('phone'),
            'mobile'      => $this->input->post('mobile'),
            'address'     => $this->input->post('address')
        );

        $inserted = $this->db->replace('ncda_contact_catalog', $data);

        if(!empty( $this->input->post('meeting'))):
            $meeting_attendant = array('contact_id'  => $this->db->insert_id(),
                             'meeting_id'  => $this->input->post('meeting'));
            $this->db->insert('ncda_meeting_participants',$meeting_attendant);
        endif;

        return $inserted;
    }


    public function updateContact($id) 
    {
        $user_id = 1; 

        $data = array(
            'first_name'  => $this->input->post('firstname'),
            'last_name'   => $this->input->post('lastname'),
            'gender'      => $this->input->post('gender'),
            'title'       => $this->input->post('title'),
            'represents'  => $this->input->post('organization'),
            'email'       => $this->input->post('email'),
            'phone'       => $this->input->post('phone'),
            'mobile'      => $this->input->post('mobile'),
            'address'     => $this->input->post('address')
        );

        if(!empty( $this->input->post('meeting'))):
            $meeting_attendant = array('contact_id'  => $id,
                             'meeting_id'  => $this->input->post('meeting'));
            $this->db->insert('ncda_meeting_participants',$meeting_attendant);
        endif;


        if($id==0){
            return $this->db->insert('ncda_contact_catalog',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_contact_catalog',$data);
        }        
    }

}

