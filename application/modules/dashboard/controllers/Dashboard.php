<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	
	public  function __construct(){
		parent:: __construct();

			$this->dashmodule="dashboard";
			$this->load->model("dashboard_mdl",'dash_mdl');
			$this->load->model("dashboard_mdl",'dash_mdl');
			
			

			}

	public function index()
	{
		
		$userdata=$this->session->get_userdata(); 


		if($userdata['changed'] == 0){
		  set_flash('Please change your password',true);
		  redirect('auth/myprofile');
		}

		redirect(site_url('summary'));

		// $data['module']=$this->dashmodule;
		// $data['title']="Main Dashboard";
		// $data['uptitle']="Main Dashboard";
		// $data['view']="home";
		// $data['activeProjects']=Modules::run('projects/ActiveProjects');
		// $data['completedProjects']=Modules::run('projects/CompletedProjects');
		// $data['topFiveProjects']=Modules::run('projects/getTopFive');
		// $data['activeBranches']=Modules::run('districts/ActiveBranches');
		// $data['contacts']= $this->dash_mdl->countContactCatalog();
		
		// render_view($data);
	}


	public function dashboardData(){
		
		$data = $this->dash_mdl->getData();
	     echo json_encode($data);
	}



}
