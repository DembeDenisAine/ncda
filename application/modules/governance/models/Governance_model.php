<?php 

class Governance_model extends CI_Model{


    public function get($limit=null, $start=null){
        
        $this->db->limit($limit,$start);
        $query = $this->db->get("ncda_board_members")->result();
        return $query;
        
    }


    public function insert()
    {    
        $data = array(
            'title'     => $this->input->post('title'),
            'first_name'=> $this->input->post('fname'),
            'last_name' => $this->input->post('lname'),
            'role'      => $this->input->post('role'),
            'phone_no'  => $this->input->post('phone'),
            'email_address' => $this->input->post('email'),
            'from_year'  => $this->input->post('start_year'),
            'to_year'    => $this->input->post('to_year'),
            'partner_id' => $this->input->post('partner')
        );
        return $this->db->insert('ncda_board_members', $data);
    }


    public function count_members()
    {   
        $query = $this->db->get('ncda_board_members')->num_rows();
        return $query;
    }

    public function update($id) 
    {
        $data = array(
            'title'     => $this->input->post('title'),
            'first_name'=> $this->input->post('fname'),
            'last_name' => $this->input->post('lname'),
            'role'      => $this->input->post('role'),
            'phone_no'  => $this->input->post('phone'),
            'email_address' => $this->input->post('email'),
            'from_year'  => $this->input->post('start_year'),
            'to_year'    => $this->input->post('to_year'),
            'partner_id' => $this->input->post('partner')
        );

        if($id==0){
            return $this->db->insert('ncda_board_members',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('ncda_board_members',$data);
        }        
    }


}

