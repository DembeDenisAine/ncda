<?php

class Projects extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="projects";
        $this->load->model("projects_model",'projectsModel'); //Projects model
        $this->load->model("objectives/objectives_model",'objectivesModel'); //Objectives model
        $this->load->model("activities/activities_model",'activitiesModel'); //Activities model
        $this->load->model("districts/districts_model",'districtsModel'); //Districts model
        $this->load->model("parameters/parameters_model",'parametersModel'); //Districts model
        $this->load->model("facilities/facilities_model",'facilitiesnModel');
        
    }

    public function index(){  //projects list
    
        $data['module']=$this->module;
        $data['title']="Projects";
        $data['view']="projects_list";

        $count = $this->projectsModel->countProjects();
        $page = ($this->uri->segment(2))?$this->uri->segment(2):0;
        $perPage = 5;

        $data['projects'] = $this->projectsModel->get($perPage,$page);
        $data['links'] = paginate('project-list',$count, $perPage,2);

        render_view($data);
    }
    
    public function create(){ // add projects form
    
        $data['module']=$this->module;
        $data['title']="Create Project";
        $data['view']="create_project";

        render_view($data);
    }

    public function store() { //save project

        $this->projectsModel->insert();
        set_flash('Project saved successfully');
        return redirect(site_url('project-list'));
    }


    public function singleProject($id = null){ //show single project

        $data['project_obj'] = $this->projectsModel->find($id);
        $data['module']=$this->module;
        $data['title']="Projects";
        $data['view']="edit_project";
        
        render_view($data);
    }

    public function update($id = null){ //updat project

        $this->projectsModel->update($this->input->post('id'));
        set_flash('Project updated successfully');
        return redirect(site_url('project-list'));
    }
 
    public function delete($id = null){ //delete project

        $this->projectsModel->delete($id);
        return redirect(site_url('project-list'));
    }  

    public function dataEntry($id = null){ //show single project

        $data['project']     = $this->projectsModel->find($id);
        $data['objectives']  = $this->objectivesModel->objectives_by_project_id($id);


        $objectiveId = ($this->input->post('objective_id'))?$this->input->post('objective_id'):null;
        $data['selectedObjective']  = ($objectiveId)? $this->objectivesModel->find($objectiveId): null;
        
        $activities   = ($objectiveId)?$this->activitiesModel->activities_by_objective_id($objectiveId):[];
       
        $data['selectedFacility'] = ($this->input->post('facility'))?$this->input->post('facility'):null;
        $data['activities']    = $this->paramtizedActivities($activities );
        $data['facilities']    = ($objectiveId)?$this->facilitiesnModel->get():[];
        $data['module']        = $this->module;

        $data['title'] = "Field Data Entry";
        $data['view']  = "data_entry";
        
        render_view($data);
    }

    private function paramtizedActivities($activities){
        
        foreach($activities as $act){
            $act->parameters   = $this->parametersModel->parameters_by_activity_id($act->id);
        }
        return $activities;
    }


    public function submitData(){

        $this->projectsModel->saveData();
        set_flash('Activty data saved successfully');
        redirect(site_url('entry/'.$this->input->post('project_id')));
    }

    //Number of Completed project
    public function CompletedProjects(){ 
        return $this->projectsModel->countCompletedProjects();
    }

    //Number of Active project
    public function ActiveProjects(){ 
        return $this->projectsModel->countActiveProjects();
    }

    //get Top Five projects
    public function getTopFive(){ 
        return $this->projectsModel->getTopFive();
    }
    

}

