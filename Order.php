<?php
require_once 'config.php';

class Order {
    public $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah order baru
    public function createOrder($order_id_user, $order_tgl, $order_kode, $order_ttl, $order_kurir, $order_ongkir, $order_byr_deadline, $order_batal) {
        $currentDateTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tb_order (order_id_user, order_tgl, order_kode, order_ttl, order_kurir, order_ongkir, order_byr_deadline, order_batal, updated_at) VALUES ('$order_id_user', '$order_tgl', '$order_kode', '$order_ttl', '$order_kurir', '$order_ongkir', '$order_byr_deadline', '$order_batal', '$currentDateTime')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil order berdasarkan ID
    public function getOrderById($order_id) {
        $sql = "SELECT * FROM tb_order WHERE order_id = '$order_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate order
    public function updateOrder($order_id, $order_id_user, $order_tgl, $order_kode, $order_ttl, $order_kurir, $order_ongkir, $order_byr_deadline, $order_batal) {
        // Tanggal dan waktu saat ini
        $currentDateTime = date('Y-m-d H:i:s');

        $sql = "UPDATE tb_order SET 
                    order_id_user = '$order_id_user', 
                    order_tgl = '$order_tgl', 
                    order_kode = '$order_kode', 
                    order_ttl = '$order_ttl', 
                    order_kurir = '$order_kurir', 
                    order_ongkir = '$order_ongkir', 
                    order_byr_deadline = '$order_byr_deadline', 
                    order_batal = '$order_batal', 
                    updated_at = '$currentDateTime' 
                WHERE order_id = '$order_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus order
    public function deleteOrder($order_id) {
        $sql = "DELETE FROM tb_order WHERE order_id = '$order_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua order
    public function getAllOrders() {
        $sql = "SELECT * FROM tb_order";
        $result = $this->conn->query($sql);
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    }
}
?>
