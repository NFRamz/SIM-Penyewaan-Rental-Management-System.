<?php
require_once 'config/database.php';

$page       = isset($_GET['page'])       ? $_GET['page']        : 'armada';
$action     = isset($_GET['action'])     ? $_GET['action']      : 'index';
$id         = isset($_GET['id'])         ? $_GET['id']          : null;
$vehicle_id = isset($_GET['vehicle_id']) ? $_GET['vehicle_id']  : null;

$controller = null;

switch ($page) {
    case 'pesan_masuk':
        require_once 'Pesan_Masuk/controllers/TransactionController.php';
        $controller = new TransactionController();
        break;
    case 'armada':
    default:
        require_once 'Data_armada/controllers/VehicleController.php';
        $controller = new VehicleController();
        break;
}

// Routing Aksi
switch ($action) {
    case 'create':
        if ($page == 'pesan_masuk' && $vehicle_id) {
            $controller->create($vehicle_id);
        } else {
            $controller->create();
        }
        break;

    case 'store':
        $controller->store();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'update':
        if ($id) $controller->update($id);
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>