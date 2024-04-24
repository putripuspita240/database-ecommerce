<?php
require_once 'config.php';

class Produk {
    public $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah produk baru
    public function createProduk($produk_id_kat, $produk_id_user, $produk_kode, $produk_nama, $produk_hrg, $produk_keterangan, $produk_stok, $produk_foto) {
        $currentDateTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tb_produk (produk_id_kat, produk_id_user, produk_kode, produk_nama, produk_hrg, produk_keterangan, produk_stok, produk_foto, created_at, updated_at) VALUES ('$produk_id_kat', '$produk_id_user', '$produk_kode', '$produk_nama', '$produk_hrg', '$produk_keterangan', '$produk_stok', '$produk_foto', '$currentDateTime', '$currentDateTime')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil produk berdasarkan ID
    public function getProdukById($produk_id) {
        $sql = "SELECT * FROM tb_produk WHERE produk_id = '$produk_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate produk
    public function updateProduk($produk_id, $produk_id_kat, $produk_id_user, $produk_kode, $produk_nama, $produk_hrg, $produk_keterangan, $produk_stok, $produk_foto) {
        $currentDateTime = date('Y-m-d H:i:s');
        $sql = "UPDATE tb_produk SET produk_id_kat = '$produk_id_kat', produk_id_user = '$produk_id_user', produk_kode = '$produk_kode', produk_nama = '$produk_nama', produk_hrg = '$produk_hrg', produk_keterangan = '$produk_keterangan', produk_stok = '$produk_stok', produk_foto = '$produk_foto', updated_at = '$currentDateTime' WHERE produk_id = '$produk_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus produk
    public function deleteProduk($produk_id) {
        $sql = "DELETE FROM tb_produk WHERE produk_id = '$produk_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua produk
    public function getAllProduk() {
        $sql = "SELECT * FROM tb_produk";
        $result = $this->conn->query($sql);
        $produks = [];
        while ($row = $result->fetch_assoc()) {
            $produks[] = $row;
        }
        return $produks;
    }
}
?>
