<?php

class Objectives extends MX_Controller
{

    public  function __construct(){
        parent:: __construct();

        $this->module = "objectives";
        $this->load->model("objectives_model",'objectivesModel'); //objectives model
        $this->load->model("projects/projects_model",'projectsModel'); //projects model
            
    }

    public function index($id = false)
    {   
        $project = $this->projectsModel->find($id);
        $data['proj_name'] = $project->project_name;
        $data['proj_id']   = $id;
        $data['project']   = $this->projectsModel->find($id);

        $count   = $this->objectivesModel->countObjects($id);
        $page    = ($this->uri->segment(3))?$this->uri->segment(3):0;
        $perPage = 2;

        $data['objectives'] = $this->objectivesModel->objectives_by_project_id($id,$perPage,$page);
        $data['links']      = paginate('objective-list/'.$id,$count,$perPage,3);
        $data['page']   = $page;
        $data['module'] = $this->module;
        $data['title']  = "Objectives";
        $data['view']   = "data";

        echo Modules::run('templates/main',$data);
    }
    
    
    public function create($id){ // add objectives form
    
        $data['module']  = $this->module;
        $data['title']   = "Create an Objective";
        $data['view']    = "create";
        $data['project'] = $this->projectsModel->find($id);
        
        echo Modules::run('templates/main',$data);
    }

    public function store() { //save objective

        $this->objectivesModel->insert();
        set_flash('Objective saved successfully');
        return redirect(site_url('objective-list/'.$this->input->post('project_id')));
    }


    public function singleObjective($id = null){ //show single objective

        $data['objective'] = $this->objectivesModel->find($id);
        $data['project']   = $this->projectsModel->find($id);

        $data['module'] = $this->module;
        $data['title']  = "Edit Objective";
        $data['view']   = "edit";

        echo Modules::run('templates/main',$data);
    }

    public function update(){ //updat objective
        $this->objectivesModel->update($this->input->post('id'));
        set_flash('Objective updated successfully');
        return redirect(site_url('objective-list/'.$this->input->post('project_id')));
    }
 
    public function delete($id = null){ //delete objective

        $this->projectsModel->delete($id);
        return redirect(site_url('parameter-list'));
    }  


}

