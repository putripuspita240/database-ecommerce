<?php
require_once '../config.php';
require_once '../order.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $order_id = $_POST['order_id'];

    // Membuat objek dari kelas Order
    $order = new Order();

    // Memanggil method deleteOrder() untuk menghapus order
    $result = $order->deleteOrder($order_id);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error deleting order: " . $order->conn->error;
    }
}
?>
