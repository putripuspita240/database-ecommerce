<?php
require_once 'config.php';

class Keranjang {
    private $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah barang ke keranjang
    public function addToCart($ker_id_user, $ker_id_produk, $ker_harga, $ker_jml) {
        $sql = "INSERT INTO tb_keranjang (ker_id_user, ker_id_produk, ker_harga, ker_jml) VALUES ('$ker_id_user', '$ker_id_produk', '$ker_harga', '$ker_jml')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil barang dari keranjang berdasarkan ID
    public function getCartItemById($ker_id) {
        $sql = "SELECT * FROM tb_keranjang WHERE ker_id = '$ker_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate barang dalam keranjang
    public function updateCartItem($ker_id, $ker_id_user, $ker_id_produk, $ker_harga, $ker_jml) {
        $sql = "UPDATE tb_keranjang SET ker_id_user = '$ker_id_user', ker_id_produk = '$ker_id_produk', ker_harga = '$ker_harga', ker_jml = '$ker_jml' WHERE ker_id = '$ker_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus barang dari keranjang
    public function deleteCartItem($ker_id) {
        $sql = "DELETE FROM tb_keranjang WHERE ker_id = '$ker_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua barang dari keranjang
    public function getAllCartItems() {
        $sql = "SELECT * FROM tb_keranjang";
        $result = $this->conn->query($sql);
        $cartItems = [];
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }
        return $cartItems;
    }
}
?>
