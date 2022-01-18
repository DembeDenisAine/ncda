<?php 

class Meetings_model extends CI_Model{

    public function get($perPage,$page){
        $this->db->limit($perPage,$page);
        $this->db->order_by('id','desc');
        $query = $this->db->get("ncda_meetings");
        return $query->result();
    }

    public function countMeetings(){
        return $this->db->count_all("ncda_meetings");
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


    public function update() 
    {
        $user_id = 1; 
        $id = $this->input->post('id');

        $data = array(
            'meeting_name' => $this->input->post('title'),
            'meeting_description' => $this->input->post('description'),
            'meeting_date'        => $this->input->post('date'),
            'venue'               => $this->input->post('venue'),
            'start_at'            => $this->input->post('start_time'),
            'end_at'              => $this->input->post('end_time')
        );

        $this->db->where('id',$id);
        return $this->db->update('ncda_meetings',$data);
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
        $this->db->order_by('ncda_meeting_participants.id','desc');
        $this->db->join('ncda_contact_catalog',
        'ncda_contact_catalog.id = ncda_meeting_participants.contact_id');
        return $this->db->get_where('ncda_meeting_participants', array('meeting_id' => $id))->result();
    }

    //contacts
    public function getContacts($perPage,$page){
        $this->db->order_by('id','desc');
        $this->db->limit($perPage,$page);  
        return $this->db->get('ncda_contact_catalog')->result();
    }

    //contacts
    public function countContacts(){
        return $this->db->count_all('ncda_contact_catalog');
    }

    //meeting impacts
    public function getImpacts($id){
        $this->db->order_by('ncda_meeting_impacts.id','desc');
        return $this->db->get_where('ncda_meeting_impacts', array('meeting_id' => $id))->result();
    }

    //meeting discussions
    public function getDiscussions($id){
        $this->db->order_by('ncda_meeting_discusions.id','desc');
        return $this->db->get_where('ncda_meeting_discusions', array('meeting_id' => $id))->result();
    }

    //meeting discussions
    public function getActionPoints($id){
        $this->db->order_by('ncda_meeting_action_points.id','desc');
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

         //for Updates
         if(!empty( $this->input->post('contact')))
           $data ['id'] = $this->input->post('contact');

        $inserted = $this->db->replace('ncda_contact_catalog', $data);

        if(!empty( $this->input->post('meeting'))):
            $meeting_attendant = array('contact_id'  => $this->db->insert_id(),
                             'meeting_id'  => $this->input->post('meeting'));
            $this->db->insert('ncda_meeting_participants',$meeting_attendant);
        endif;

        return $inserted;
    }

    //saves a Discussion
    public function saveDiscussion()
    {   
        $data = array(
            'meeting_id'   => $this->input->post('meeting'),
            'item_name'    => $this->input->post('topic'),
            'item_details' => $this->input->post('details')
        );

        //for Updates
        if(!empty($this->input->post('discussion'))){

            $id = $this->input->post('discussion');
            $this->db->where('id',$id);
            $this->db->update('ncda_meeting_discusions', $data);
            
        }else{
          return  $this->db->insert('ncda_meeting_discusions', $data);
        }
    }

      //saves an action Point
      public function saveActionPoint()
      {   
          $data = array(
              'meeting_id'   => $this->input->post('meeting'),
              'action_point'    => $this->input->post('action'),
          );
  
          //for Updates
          if(!empty( $this->input->post('action_id')))
              $data ['id'] = $this->input->post('action_id');
  
          $inserted = $this->db->replace('ncda_meeting_action_points', $data);
          return $inserted;
      }
  
   
    

}

