<?php

class Districts extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="districts";
        $this->load->model("districts_model",'districtModel'); //districts model
            
    }

    //get district list
    public function index(){  

        $page  = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        $route = 'district-list';
        $perPage = 10;

        $count = $this->districtModel->district_count();
        $data['districts'] = $this->districtModel->get($perPage, $page);

        $data['links'] = paginate($route, $count, $perPage, 2);
        $data['module']=$this->module;
        $data['title']="Districts";
        $data['view']="data";

        
        render_view($data);
    }
    
    
    //save district
    public function store() { 

        $this->districtModel->insert();
        return redirect(site_url('district-list'));
    }

    //updat district
    public function update($id = null){ 

        $this->districtModel->update($id);
        return redirect(site_url('district-list'));
    }
 
    //delete district
    public function delete($id = null){ 

        $this->districtModel->delete($id);
        return redirect(site_url('district-list'));
    }  


    //Number of branches- districts
    public function ActiveBranches(){ 
        return $this->districtModel->countActiveBranches();
    }

     //create district teams - form
    public function create_team($id){

        $district = $this->districtModel->find($id);
        $data['district'] = $district->district_name;
        $data['district_id']=$id;
        $data['facilities'] = $this->districtModel->get_facilities($id);
        $data['module']=$this->module;
        $data['title']="Branch Teams ".$district->district_name.": Branch";

        $data['view']="create_teams";
        render_view($data);
    }

    //save team
    public function save_branch_team() { 

        $data = $this->districtModel->insert_district_teams();

        return redirect(site_url('teams-district/'.$data));
    }

    //get district teams
    public function get_teams($id){ 

        $count = $this->districtModel->district_teams_count($id);

        $page  = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $route = 'teams-district/'.$id;
        $perPage = 3;

        $data['teams'] = $this->districtModel->district_teams($id, $perPage, $page);
        $data['links'] = paginate($route, $count, $perPage, 3);

        $data['facilities'] = $this->districtModel->facilities_by_district($id);
        $data['district'] = $this->districtModel->find($id);
        $data['district_id']=$id;
        $data['module']=$this->module;
        $data['title']="Branch Teams";

        $data['view']="teams";
        render_view($data);
    }

    //edit district team - form
    public function edit_team($id, $district_id){ 

        $data['staff'] = $this->districtModel->single_district_staff($id);
        $district = $this->districtModel->find($district_id);
        $data['district'] = $district->district_name;
        $data['district_id']=$district_id;
        $data['facilities'] = $this->districtModel->get_facilities($district_id);
        $data['module']=$this->module;
        $data['title']="Edit Branch Teams - ".$district->district_name.": Branch";

        $data['view']="edit_teams";
        render_view($data);
    }

    //update team
    public function update_district_team() {  

        $data = $this->districtModel->update_district_teams();
        redirect(site_url('teams-district/'.$data));
    }

    //update team
    public function delete_district_team($id, $district_id) {  
        $district = $district_id;
        $this->districtModel->delete_district_staff($id);
        redirect(site_url('teams-district/'.$district));
    }

public function excel_upload(){

    $config['upload_path'] = FCPATH.'uploads/';
    $config['allowed_types'] = 'csv|xls|xlsx';
    $config['max_size']      = 200000;
    $config['file_name']     ="distrcits_file";

    //$file_name=$config['file_name'];

   $this->load->library('upload', $config);

   $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('upload_file'))
    {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
    }
    else
    {
                        
        
        $file_name= $this->upload->data('file_name'); 

        $this->load->library('excel');
        
        $type = PHPExcel_IOFactory::identify('uploads/'.$file_name);
        
        $objReader=PHPExcel_IOFactory::createReader($type);     //For excel 2003 
          //Set to read only
        $objReader->setReadDataOnly(true);          
        //Load excel file
        $objPHPExcel=$objReader->load(strip_tags(FCPATH.'uploads/'.$file_name));    
        
         
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);  
         

        
        $rowsnow=0;
        $data = [];
         //loop from first data untill last data
         for($i=2;$i<=$totalrows;$i++)
          {

              $district_name = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
              $region        = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();

              // $detail     = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
              // $qnty       = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
              // $category   = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
              // $department = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
              // $incharge   = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
              // $state      = strtolower($objWorksheet->getCellByColumnAndRow(7,$i)->getValue());
              

             // $aq_date    = PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(6,$i)->getFormattedValue());
              
                //date of purchase
             //$bought= date("Y-m-d",$aq_date);
            
             //build the array to insert
                
             $row    = array('district_name'=>$district_name, 'region'=>$region );
             $data[] = $row;
             
         }

         $this->districtModel->insert_district_batch($data);
         $alert = "Data imported successfully";
     
     }
      
            
       unlink(FCPATH.'uploads/'.$file_name); //File Deleted After uploading
       set_flash($alert);
       redirect(site_url('district-list'));
    
    }


 }
    
