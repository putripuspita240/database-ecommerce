<?php
require_once 'config.php';

class OrderDetail {
    private $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah detail order baru
    public function createOrderDetail($detail_id_order, $detail_id_produk, $detail_harga, $detail_jml) {
        $sql = "INSERT INTO tb_order_detail (detail_id_order, detail_id_produk, detail_harga, detail_jml) VALUES ('$detail_id_order', '$detail_id_produk', '$detail_harga', '$detail_jml')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil detail order berdasarkan ID
    public function getOrderDetailById($detail_id) {
        $sql = "SELECT * FROM tb_order_detail WHERE detail_id = '$detail_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate detail order
    public function updateOrderDetail($detail_id, $detail_id_order, $detail_id_produk, $detail_harga, $detail_jml) {
        $sql = "UPDATE tb_order_detail SET detail_id_order = '$detail_id_order', detail_id_produk = '$detail_id_produk', detail_harga = '$detail_harga', detail_jml = '$detail_jml' WHERE detail_id = '$detail_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus detail order
    public function deleteOrderDetail($detail_id) {
        $sql = "DELETE FROM tb_order_detail WHERE detail_id = '$detail_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua detail order
    public function getAllOrderDetails() {
        $sql = "SELECT * FROM tb_order_detail";
        $result = $this->conn->query($sql);
        $orderDetails = [];
        while ($row = $result->fetch_assoc()) {
            $orderDetails[] = $row;
        }
        return $orderDetails;
    }
}
?>
