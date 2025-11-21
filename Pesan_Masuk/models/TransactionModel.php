<?php
require_once 'config/database.php';

class TransactionModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll($keyword = null) {
        $sql = "SELECT t.*, k.nama_kendaraan, k.nomor_plat FROM transaksi t JOIN kendaraan k ON t.id_kendaraan = k.id ";
        //$sql  = "SELECT t.*, k.nama_kendaraan, k.nomor_plat FROM transaksi t JOIN kendaraan k ON t.id_kendaraan = k.id ORDER BY t.created_at DESC";
        
        if ($keyword) {
            $sql .= " WHERE t.nama_penyewa LIKE ? OR k.nama_kendaraan LIKE ? OR k.nomor_plat LIKE ?";
            $sql .= " ORDER BY t.created_at DESC";
            $stmt   = $this->db->conn->prepare($sql);
            $param  = "%$keyword%";
            $stmt->bind_param("sss", $param, $param, $param);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $sql .= " ORDER BY t.created_at DESC";
            $result = $this->db->conn->query($sql);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function create($data) {
        $stmt = $this->db->conn->prepare("INSERT INTO transaksi (id_kendaraan, nama_penyewa, tanggal_mulai, tanggal_selesai, total_biaya) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $data['vehicle_id'], $data['nama'], $data['tgl_mulai'], $data['tgl_selesai'], $data['total']);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM transaksi WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>