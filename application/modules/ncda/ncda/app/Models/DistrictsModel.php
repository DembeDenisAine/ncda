<?php 
namespace App\Models;
use CodeIgniter\Model;

class DistrictsModel extends Model
{
    protected $table = 'ncda_districts';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['district_name', 'region','notes','active'];
}