<?php
require_once 'Data_armada/models/VehicleModel.php';

class VehicleController {
    private $model;

    public function __construct() {
        $this->model = new VehicleModel();
    }

    public function index() {
        $vehicles   = $this->model->getAll();
        $view       = 'Data_armada/views/list.php'; 
        require 'views/layout.php';
    }

    public function create() {
        $view   = 'Data_armada/views/form.php';
        $title  = 'Tambah Kendaraan';
        require 'views/layout.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['tahun']) || empty($_POST['plat']) || empty($_POST['harga'])) {
                echo "<script> alert('Gagal simpan: Ada data yg kosong');window.history.back(); </script>";
                exit; 
            }

            $this->model->create($_POST);
            header('Location: index.php?page=armada');
        }
    }

    public function edit($id) {
        $vehicle    = $this->model->getById($id);
        $view       = 'Data_armada/views/form.php';
        $title      = 'Edit Kendaraan';
        require 'views/layout.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['jenis'])) {
                echo "<script>alert('Gagal: Jenis Kendaraan kosong.'); window.history.back();</script>";
                exit;
            }
            
            $this->model->update($id, $_POST);
            header('Location: index.php?page=armada');
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?page=armada');
    }
}
?>