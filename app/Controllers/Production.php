<?php
namespace App\Controllers;
use App\Models\ProductionModel;
use App\Models\MachineModel;
use CodeIgniter\Controller;

class Production extends Controller
{
    protected $productionModel;
    protected $machineModel;

    public function __construct()
    {
        $this->productionModel = new ProductionModel();
        $this->machineModel    = new MachineModel();
    }

    public function index()
    {
        $machines = $this->machineModel->findAll();
        return view('production/index', ['machines' => $machines]);
    }

    // Data untuk DataTables
    public function getData()
    {
        $data = $this->productionModel->getAllData();
        return $this->response->setJSON(['data' => $data]);
    }

    // Data kompleks dengan WorkOrder
    public function getDataComplex()
    {
        $data = $this->productionModel->getProductionWithWorkOrder();
        return $this->response->setJSON(['data' => $data]);
    }

    // Simpan data baru
    public function save()
    {
        $this->productionModel->save([
            'MachineID'       => $this->request->getPost('MachineID'),
            'ProductionDate'  => $this->request->getPost('ProductionDate'),
            'Shift'           => $this->request->getPost('Shift'),
            'OutputQty'       => $this->request->getPost('OutputQty'),
            'DefectQty'       => $this->request->getPost('DefectQty'),
        ]);
        return $this->response->setJSON(['status' => 'success']);
    }

    // app/Controllers/Production.php
    public function update($id)
    {
        $this->productionModel->update($id, [
            'MachineID'      => $this->request->getPost('MachineID'),
            'ProductionDate' => $this->request->getPost('ProductionDate'),
            'Shift'          => $this->request->getPost('Shift'),
            'OutputQty'      => $this->request->getPost('OutputQty'),
            'DefectQty'      => $this->request->getPost('DefectQty'),
        ]);

        return $this->response->setJSON(['status' => 'updated']);
    }

    // Hapus data
    public function delete($id)
    {
        $this->productionModel->delete($id);
        return $this->response->setJSON(['status' => 'deleted']);
    }
}
