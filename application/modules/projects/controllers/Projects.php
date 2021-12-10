<?php

class Projects extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="projects";
        $this->load->model("projects_model",'PM'); //Projects model
            
    }

    public function index(){  //projects list
    
        $data['module']=$this->module;
        $data['title']="Projects";

        $data['view']="data";

        $data['projects'] = $this->PM->get();
        echo Modules::run('templates/main',$data);
    }
    
    public function create(){ // add projects form
    
        $data['module']=$this->module;
        $data['title']="Create Project";

        $data['view']="create";
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save project

        $this->PM->insert();
        return $this->response->redirect(site_url('project-list'));
    }


    public function singleProject($id = null){ //show single project

        $data['project_obj'] = $this->PM->find($id);

        $data['module']=$this->module;
        $data['title']="Projects";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat project

        $this->PM->update($id);
        return $this->response->redirect(site_url('project-list'));
    }
 
    public function delete($id = null){ //delete project

        $this->PM->delete($id);
        return $this->response->redirect(site_url('project-list'));
    }  


}

