<?php 
namespace App\Models;
use CodeIgniter\Model;

class FacilitiesModel extends Model
{
    protected $table = 'ncda_facilities';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['facility_name', 'facilty_description','facility_head','district_id'];
}