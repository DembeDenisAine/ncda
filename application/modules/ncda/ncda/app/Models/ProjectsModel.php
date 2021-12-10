<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table = 'ncda_projects';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['project_name', 'project_description','duration','start_date','end_date'];
}