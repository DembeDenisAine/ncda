<?php 

class Partners_model extends CI_Model{

    protected $table;

    public  function __construct()
    {
        $this->table = "ncda_partners";
    }

    public function count_partners()
    {   
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }

    public function get($limit=null, $start=null){

        $search = $this->input->post('search');


        if(!empty($search)){
            $this->db->like('partner_name',$search);
            $this->db->or_like('partner_description',$search);
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
            'partner_name' => $this->input->post('name'),
            'partner_description' => $this->input->post('desc'),
            'address'  => $this->input->post('address'),
            'email'    => $this->input->post('email'),
            'phone_no' => $this->input->post('phone'),
            'since'    => $this->input->post('start_year'),
            'contact_person' => $this->input->post('contact_person')
        );

        return $this->db->insert($this->table, $data);
    }

    public function update()
    {    
        $data = array(
            'partner_name' => $this->input->post('name'),
            'partner_description' => $this->input->post('desc'),
            'address'  => $this->input->post('address'),
            'email'    => $this->input->post('email'),
            'phone_no' => $this->input->post('phone'),
            'since'    => $this->input->post('start_year'),
            'is_active'=> ($this->input->post('is_active')!=null)?$this->input->post('is_active'):0,
            'contact_person' => $this->input->post('contact_person')
        );

        $this->db->where('id',$this->input->post('partner_id'));
        return $this->db->insert($this->table, $data);
    }

}

