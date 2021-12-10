<?php 
namespace App\Models;
use CodeIgniter\Model;

class ParameterModel extends Model
{
    protected $table = 'ncda_parameters';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['parameter_name', 'parameter_description','activity_id','created_by'];


    public function parameters_with_activities_info() {

        $builder = $this->db->table('ncda_parameters as np');
        $builder->select('np.*, no.activity_name as activity_name');
        $builder->join('ncda_activities as no', 'np.activity_id = no.id');
        $data = $builder->get()->getResult();
        return $data;

    } 

    public function parameters_by_activity_id($id) {

        $builder = $this->db->table('ncda_parameters as np');
        $builder->select('np.*, no.activity_name as activity_name');
        $builder->join('ncda_activities as no', 'np.activity_id = no.id');
        $builder->where('np.activity_id',$id);
        $data = $builder->get()->getResult();
        return $data;

    } 

}
