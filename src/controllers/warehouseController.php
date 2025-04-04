<?php
class WarehouseController {
    private $warehouseModel;

    public function __construct($pdo) {
        $this->warehouseModel = new Warehouse($pdo);
    }
    public function showAll() {
        return $this->warehouseModel->getAll(); 
    }
    public function create($name, $address) {
        return $this->warehouseModel->create($name, $address); 
    }
    public function edit($id) {
        return $this->warehouseModel->getById($id); 
    }
    public function update($id,$name,$address){
        return $this->warehouseModel->update($id,$name,$address);
    }
    public function delete($id) {
        return $this->warehouseModel->delete($id); 
    }
}
?>     