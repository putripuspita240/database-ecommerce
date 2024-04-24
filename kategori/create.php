<?php
require_once '../config.php';
require_once '../kategori.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $kat_nama = $_POST['kat_nama'];
    $kat_keterangan = $_POST['kat_keterangan'];

    // Membuat objek dari kelas Kategori
    $kategori = new Kategori();

    // Memanggil method createKategori() untuk menambah kategori
    $result = $kategori->createKategori($kat_nama, $kat_keterangan);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error creating category.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2>Create New Category</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="kat_nama">Category Name:</label>
                <input type="text" class="form-control" id="kat_nama" name="kat_nama" required>
            </div>
            <div class="form-group">
                <label for="kat_keterangan">Description:</label>
                <textarea class="form-control" id="kat_keterangan" name="kat_keterangan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Back to Category List</a>
        </form>
    </div>

</body>
</html>
