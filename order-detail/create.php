<?php
require_once '../config.php';
require_once '../orderDetail.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $detail_id_order = $_POST['detail_id_order'];
    $detail_id_produk = $_POST['detail_id_produk'];
    $detail_harga = $_POST['detail_harga'];
    $detail_jml = $_POST['detail_jml'];

    // Membuat objek dari kelas OrderDetail
    $orderDetail = new OrderDetail();

    // Memanggil method createOrderDetail() untuk menambah detail order
    $result = $orderDetail->createOrderDetail($detail_id_order, $detail_id_produk, $detail_harga, $detail_jml);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error creating order detail.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New Order Detail</h2>
        <form action="process_create.php" method="POST">
            <div class="form-group">
                <label for="detail_id_order">Order ID:</label>
                <input type="text" class="form-control" id="detail_id_order" name="detail_id_order" required>
            </div>
            <div class="form-group">
                <label for="detail_id_produk">Product ID:</label>
                <input type="text" class="form-control" id="detail_id_produk" name="detail_id_produk" required>
            </div>
            <div class="form-group">
                <label for="detail_harga">Price:</label>
                <input type="text" class="form-control" id="detail_harga" name="detail_harga" required>
            </div>
            <div class="form-group">
                <label for="detail_jml">Quantity:</label>
                <input type="text" class="form-control" id="detail_jml" name="detail_jml" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back to Order Detail List</a>
        </form>
    </div>
</body>
</html>
