<?php
require_once 'config/database.php';

class VehicleModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $result = $this->db->conn->query("SELECT * FROM kendaraan");
        $data   = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getById($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM kendaraan WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->db->conn->prepare("INSERT INTO kendaraan (nama_kendaraan, jenis, tahun, nomor_plat, harga_sewa) VALUES (?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssisi", $data['nama'], $data['jenis'], $data['tahun'], $data['plat'], $data['harga']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->conn->prepare("UPDATE kendaraan SET nama_kendaraan=?, jenis=?, tahun=?, nomor_plat=?, harga_sewa=? WHERE id=?");
        $stmt->bind_param("ssisii", $data['nama'], $data['jenis'], $data['tahun'], $data['plat'], $data['harga'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM kendaraan WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>