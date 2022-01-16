<?php

class Projects extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="projects";
        $this->load->model("projects_model",'projectsModel'); //Projects model
            
    }

    public function index(){  //projects list
    
        $data['module']=$this->module;
        $data['title']="Projects";
        $data['view']="projects_list";

        $count = $this->projectsModel->countProjects();
        $page = ($this->uri->segment(2))?$this->uri->segment(2):0;
        $perPage = 2;

        $data['projects'] = $this->projectsModel->get($perPage,$page);
        $data['links'] = paginate('project-list',$count,2,2);

        echo Modules::run('templates/main',$data);
    }
    
    public function create(){ // add projects form
    
        $data['module']=$this->module;
        $data['title']="Create Project";
        $data['view']="create_project";

        echo Modules::run('templates/main',$data);
    }

    public function store() { //save project

        $this->projectsModel->insert();
        return $this->response->redirect(site_url('project-list'));
    }


    public function singleProject($id = null){ //show single project

        $data['project_obj'] = $this->projectsModel->find($id);
        $data['module']=$this->module;
        $data['title']="Projects";
        $data['view']="edit_project";
        
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat project

        $this->projectsModel->update($id);
        return $this->response->redirect(site_url('project-list'));
    }
 
    public function delete($id = null){ //delete project

        $this->projectsModel->delete($id);
        return $this->response->redirect(site_url('project-list'));
    }  


}

