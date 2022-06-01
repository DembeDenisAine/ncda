<?php 

class Governance_model extends CI_Model{

    protected $table;

    public function __construct()
    {
        $this->table = "ncda_board_members";
    }

    public function get($limit=null, $start=null){

        $search = $this->input->post('search');


        if(!empty($search)){
            $this->db->like('firstname',$search);
            $this->db->or_like('lastname',$search);
            $this->db->or_like('phone_no',$search);
        }
            
        $this->db->limit($limit,$start);
        $query = $this->db->get($this->table)->result();
        return $query;
        
    }

    public function save()
    {    
        $data = array(
            'title'     => $this->input->post('title'),
            'firstname'=> $this->input->post('fname'),
            'lastname' => $this->input->post('lname'),
            'role'      => $this->input->post('role'),
            'phone_no'  => $this->input->post('phone'),
            'email_address' => $this->input->post('email'),
            'from_year'  => $this->input->post('from_year'),
            'to_year'    => $this->input->post('to_year'),
            'subscriber_id' => $this->input->post('subscriber_id')
        );


    if(!empty($_FILES['photo']['tmp_name'])){


      $config['upload_path']   = './uploads/images/'; 

      $config['allowed_types'] = 'gif|jpg|png'; 

      $config['max_size']      = 3070;
      $config['file_name']      = time();

      $this->load->library('upload', $config);

    
        if ( ! $this->upload->do_upload('photo')) {

             $error = $this->upload->display_errors(); 
             echo strip_tags($error);

          }else { 

             $file_info = $this->upload->data();

             $photofile = $file_info['file_name'];

             $path = $config['upload_path'].$photofile;

             $data['photo'] = $photofile;

          } 

      }

      return $this->db->insert($this->table, $data);
    }


    public function count_members()
    {   
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }

    public function update() { 

            $data = array(
            'title'     => $this->input->post('title'),
            'firstname'=> $this->input->post('fname'),
            'lastname' => $this->input->post('lname'),
            'role'      => $this->input->post('role'),
            'phone_no'  => $this->input->post('phone'),
            'email_address' => $this->input->post('email'),
            'from_year'  => $this->input->post('from_year'),
            'to_year'    => $this->input->post('to_year'),
            'subscriber_id' => $this->input->post('subscriber_id')
        );

    if(!empty($_FILES['photo']['tmp_name'])){


      $config['upload_path']   = './uploads/images/'; 

      $config['allowed_types'] = 'gif|jpg|png'; 

      $config['max_size']      = 3070;
      $config['file_name']      = time();

      $this->load->library('upload', $config);

    
        if ( ! $this->upload->do_upload('photo')) {

             $error = $this->upload->display_errors(); 
             echo strip_tags($error);

          }else { 

             $file_info = $this->upload->data();

             $photofile = $file_info['file_name'];

             $path = $config['upload_path'].$photofile;

             $data['photo'] = $photofile;

          } 

      }

        $this->db->where('id',$this->input->post('id'));
        return $this->db->update($this->table,$data);
    }

    public function update_about(){

         $data = $this->input->post();


         $updates = array(
            "about"  =>$data['about'],
            "mission"=>$data['mission'],
            "vision" =>$data['vision']
         );


         $this->db->where('id',1);
         return $this->db->update('setting',$updates);

    }

}

