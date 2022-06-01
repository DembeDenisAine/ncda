<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility_mdl extends CI_Model {

	
	public function __construct()
        {
                parent::__construct();

               
                $this->sliders_tb="sliders";//classes table

          

                
        }



        public function getSliders($page){

        	$this->db->where('page',$page);
                $query=$this->db->get($this->sliders_tb);

        	$sliders=$query->result();

        	return $sliders;
        }

        public function cookUpdates(){

                if (!is_dir('uploads/attachments'))
                    mkdir('./uploads/attachments', 0777, TRUE);

               /* $this->db->query("ALTER table `ncda_meetings` ADD COLUMN  meeting_type VARCHAR(20)");
                $this->db->query("ALTER table `setting` ADD COLUMN  about TEXT");
                $this->db->query("ALTER table `setting` ADD COLUMN  vision TEXT");
                $this->db->query("ALTER table `setting` ADD COLUMN  mission TEXT");
                $this->db->query("ALTER table `ncda_subscribers` ADD COLUMN  contact_person_email VARCHAR(100)");
                $this->db->query("ALTER table `ncda_subscribers` ADD COLUMN  contact_person_phone VARCHAR(100)");
                $this->db->query("ALTER table `ncda_partners` ADD COLUMN  contact_person VARCHAR(100)");
                $this->db->query("CREATE TABLE attachments ( description TEXT,attachment TEXT)");

                */

                $this->db->query("ALTER table `ncda_contact_catalog` ADD COLUMN  designation VARCHAR(100)");
                $this->db->query("ALTER table `ncda_board_members` ADD COLUMN  photo VARCHAR(100)");
                

                if (!is_dir('uploads/attachments'))
                    mkdir('./uploads/attachments', 0777, TRUE);
    }
    
}
