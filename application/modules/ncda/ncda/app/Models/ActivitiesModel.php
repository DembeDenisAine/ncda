<?php 
namespace App\Models;
use CodeIgniter\Model;

class ActivitiesModel extends Model
{
    protected $table = 'ncda_activities';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['activity_name', 'activity_description','objective_id','created_by'];


    public function activities_with_objectives_info() {

        $builder = $this->db->table('ncda_activities as na');
        $builder->select('na.*, no.objective_name as objective_name');
        $builder->join('ncda_ojectives as no', 'na.objective_id = no.id');
        $data = $builder->get()->getResult();
        return $data;

    } 

    public function activities_by_objective_id($id) {

        $builder = $this->db->table('ncda_activities as na');
        $builder->select('na.*, no.objective_name as objective_name');
        $builder->join('ncda_ojectives as no', 'na.objective_id = no.id');
        $builder->where('na.objective_id',$id);
        $data = $builder->get()->getResult();
        return $data;

    } 

}
