<?php

class Objectives extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module="objectives";
        $this->load->model("objectives_model",'objectivesModel'); //objectives model
        $this->load->model("projects_model",'projectsModel'); //projects model
            
    }

    public function index($id = false)
    {   

        if(!empty($id)){
            
            $data['objectives'] = $this->objectivesModel->objectives_by_project_id($id);

            $project = $this->projectsModel->find($id);
            $data['proj_name'] = $project->project_name;
            $data['proj_id']   = $id;

        }else{
            $data['proj_name'] = '';
            $data['proj_id'] = '';
            $data['objectives'] = $this->objectivesModel->objectives_with_project_info();
        }
        
        $data['module']=$this->module;
        $data['title']="Objectives";

        $data['view']="data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create($id){ // add objectives form
    
        $data['module'] = $this->module;
        $data['title']  = "Create an Objective";
        $data['view']   = "create";
        $data['project'] = $this->projectsModel->find($id);
        
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save objective

        $this->projectsModel->insert();
        return $this->response->redirect(site_url('objective-list'));
    }


    public function singleObjective($id = null){ //show single objective

        $data['objective'] = $this->objectivesModel->find($id);
        $data['project_obj'] = $this->projectsModel->find($id);

        $data['module']=$this->module;
        $data['title']="Objective";

        $data['view']="edit";
        echo Modules::run('templates/main',$data);
    }

    public function update($id = null){ //updat objective

        $this->projectsModel->update($id);
        return $this->response->redirect(site_url('objective-list'));
    }
 
    public function delete($id = null){ //delete objective

        $this->projectsModel->delete($id);
        return $this->response->redirect(site_url('parameter-list'));
    }  


}

