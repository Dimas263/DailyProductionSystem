<?php
namespace App\Models;
use CodeIgniter\Model;

class MachineModel extends Model
{
    protected $table = 'Machines';
    protected $primaryKey = 'MachineID';
    protected $allowedFields = ['MachineName', 'Location'];
}
