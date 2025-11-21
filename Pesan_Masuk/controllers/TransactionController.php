<?php
require_once 'Pesan_Masuk/models/TransactionModel.php';
require_once 'Data_armada/models/VehicleModel.php';

class TransactionController {
    private $model;
    private $vehicleModel;

    public function __construct() {
        $this->model        = new TransactionModel();
        $this->vehicleModel = new VehicleModel();
    }

    public function index() {
        $keyword    = isset($_GET['search']) ? $_GET['search'] : null;
        $messages   = $this->model->getAll($keyword); 
        $view       = 'Pesan_Masuk/views/transaction_list.php';
        
        require 'views/layout.php';
    }

    public function create($vehicle_id) {
        $vehicle    = $this->vehicleModel->getById($vehicle_id);
        $view       = 'Pesan_Masuk/views/rent_form.php';
        $title      = 'Formulir Sewa';
        require 'views/layout.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hitung Biaya
            $start  = new DateTime($_POST['tgl_mulai']);
            $end    = new DateTime($_POST['tgl_selesai']);
            $diff   = $start->diff($end);
            $days   = $diff->days + 1;
            $total  = $days * $_POST['harga_per_hari'];

            $data = [
                'vehicle_id'    => $_POST['vehicle_id'],
                'nama'          => $_POST['nama'],
                'tgl_mulai'     => $_POST['tgl_mulai'],
                'tgl_selesai'   => $_POST['tgl_selesai'],
                'total'         => $total
            ];

            $this->model->create($data);
            
            header('Location: index.php?page=pesan_masuk');
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?page=pesan_masuk');
    }
}
?>