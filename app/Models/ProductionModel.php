<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductionModel extends Model
{
    protected $table = 'Productions';
    protected $primaryKey = 'ProductionID';
    protected $allowedFields = ['MachineID','ProductionDate','Shift','OutputQty','DefectQty'];

    public function getAllData()
    {
        return $this->select('Productions.*, Machines.MachineName, Machines.Location')
            ->join('Machines', 'Machines.MachineID = Productions.MachineID')
            ->findAll();
    }

    public function getProductionWithWorkOrder()
    {
        return $this->select('Productions.*, Machines.MachineName, Machines.Location,
                              WorkOrders.WorkOrderID, WorkOrders.WODate, WorkOrders.Description, WorkOrders.Status')
            ->join('Machines', 'Machines.MachineID = Productions.MachineID')
            ->join('WorkOrders', 'WorkOrders.MachineID = Machines.MachineID', 'left')
            ->findAll();
    }
}
