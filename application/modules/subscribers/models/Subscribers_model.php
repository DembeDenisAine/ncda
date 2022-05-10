<?php 

class Subscribers_model extends CI_Model{

    protected $table;

    public  function __construct()
    {
        $this->table = "ncda_subscribers";
    }

    public function count_subscribers()
    {   
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }

    public function get($limit=null, $start=null){

        $search = $this->input->post('search');


        if(!empty($search)){
            $this->db->like('subscriber_name',$search);
            $this->db->or_like('subscriber_description',$search);
            $this->db->or_like('address',$search);
            $this->db->or_like('contact_person',$search);
            $this->db->or_like('phone_no',$search);
        }


        $this->db->limit($limit,$start);
        $query = $this->db->get($this->table)->result();
        
        return (object)$query;
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }


    public function save()
    {    
        $data = array(
            'subscriber_name' => $this->input->post('name'),
            'subscriber_description' => $this->input->post('desc'),
            'address'  => $this->input->post('address'),
            'email'    => $this->input->post('email'),
            'phone_no' => $this->input->post('phone'),
            'since'    => $this->input->post('start_year'),
            'is_active'=> $this->input->post('status'),
            'contact_person' => $this->input->post('contact_person'),
            'contact_person_email'=>$this->input->post('contact_person_email'),
            'contact_person_phone'=>$this->input->post('contact_person_phone')
        );

        return $this->db->insert($this->table, $data);
    }

    public function update()
    {    
        $data = array(
            'subscriber_name' => $this->input->post('name'),
            'subscriber_description' => $this->input->post('desc'),
            'address'  => $this->input->post('address'),
            'email'    => $this->input->post('email'),
            'phone_no' => $this->input->post('phone'),
            'since'    => $this->input->post('start_year'),
            'is_active'=> $this->input->post('status'),
            'contact_person' => $this->input->post('contact_person'),
            'contact_person_email'=>$this->input->post('contact_person_email'),
            'contact_person_phone'=>$this->input->post('contact_person_phone')
        );

        $this->db->where('id',$this->input->post('subscriber_id'));
        return $this->db->update($this->table, $data);
    }

    public function subscriber_membership($subscriberId){

        $this->db->select("member_count as membership, date_format(record_date, '%b %Y') as period");
        $this->db->where('subscriber_id',$subscriberId);
        $this->db->order_by('record_date','asc');
        $rows = $this->db->get('subscriber_membership')->result();

        $data['membership'] =  array_map(function($row){ return intval($row->membership); }, $rows);
        $data['periods'] =  array_map(function($row){ return $row->period; }, $rows);

        return (Object) $data;

        }

    public function current_membership($subscriberId){

        $this->db->where('subscriber_id',$subscriberId);
        $this->db->order_by('record_date','desc');
        $row = $this->db->get('subscriber_membership')->row();
        return ($row)?$row->member_count:0;
    }

     public function save_membership()
    {    
        $data = array(
            'member_count' => $this->input->post('membership'),
            'record_date' => $this->input->post('date'),
            'subscriber_id' => $this->input->post('subscriber_id')
        );

        return $this->db->insert('subscriber_membership', $data);
    }


}

