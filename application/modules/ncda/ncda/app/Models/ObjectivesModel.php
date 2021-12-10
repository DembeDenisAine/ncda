<?php 
namespace App\Models;
use CodeIgniter\Model;

class ObjectivesModel extends Model
{
    protected $table = 'ncda_ojectives';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['objective_name', 'objective_description','project_id','created_by'];


    public function objectives_with_project_info() {

        $builder = $this->db->table('ncda_ojectives as no');
        $builder->select('no.*, np.project_name as project_name');
        $builder->join('ncda_projects as np', 'no.project_id = np.id');
        $data = $builder->get()->getResult();
        return $data;

    } 

    public function objectives_by_project_id($id) {

        $builder = $this->db->table('ncda_ojectives as no');
        $builder->select('no.*, np.project_name as project_name');
        $builder->join('ncda_projects as np', 'no.project_id = np.id');
        $builder->where('no.project_id',$id);
        $data = $builder->get()->getResult();
        return $data;

    } 

}
