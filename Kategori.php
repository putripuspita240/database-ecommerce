<?php
require_once 'config.php';

class Kategori {
    private $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah kategori baru
    public function createKategori($kat_nama, $kat_keterangan) {
        // Mendapatkan tanggal dan waktu saat ini
        $currentDateTime = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO tb_kategori (kat_nama, kat_keterangan, created_at, updated_at) VALUES ('$kat_nama', '$kat_keterangan', '$currentDateTime', '$currentDateTime')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil kategori berdasarkan ID
    public function getKategoriById($kat_id) {
        $sql = "SELECT * FROM tb_kategori WHERE kat_id = '$kat_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate kategori
    public function updateKategori($kat_id, $kat_nama, $kat_keterangan) {
        // Mendapatkan tanggal dan waktu saat ini
        $currentDateTime = date('Y-m-d H:i:s');

        $sql = "UPDATE tb_kategori SET kat_nama = '$kat_nama', kat_keterangan = '$kat_keterangan', updated_at = '$currentDateTime' WHERE kat_id = '$kat_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus kategori
    public function deleteKategori($kat_id) {
        $sql = "DELETE FROM tb_kategori WHERE kat_id = '$kat_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua kategori
    public function getAllKategori() {
        $sql = "SELECT * FROM tb_kategori";
        $result = $this->conn->query($sql);
        $kategoris = [];
        while ($row = $result->fetch_assoc()) {
            $kategoris[] = $row;
        }
        return $kategoris;
    }
}
?>
