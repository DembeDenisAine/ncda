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
        $query = $this->db->query("SELECT * FROM $this->table LIMIT $start,$limit")->result();
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
            'since'    => $this->input->post('start_year')
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
            'is_active'=> $this->input->post('is_active')
        );

        $this->db->where('id',$this->input->post('subscriber_id'));
        return $this->db->insert($this->table, $data);
    }

}

