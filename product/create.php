<?php
require_once '../config.php';
require_once '../produk.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk_id_kat = $_POST['produk_id_kat'];
    $produk_id_user = $_POST['produk_id_user'];
    $produk_kode = $_POST['produk_kode'];
    $produk_nama = $_POST['produk_nama'];
    $produk_hrg = $_POST['produk_hrg'];
    $produk_keterangan = $_POST['produk_keterangan'];
    $produk_stok = $_POST['produk_stok'];

    // Mengelola foto yang diunggah
    $produk_foto = null;
    if ($_FILES['produk_foto']['error'] === UPLOAD_ERR_OK) {
        $produk_foto = base64_encode(file_get_contents($_FILES['produk_foto']['tmp_name']));
    } else {
        // Menghandle kesalahan unggah
        echo "Error uploading file.";
        exit;
    }

    $produk = new Produk();
    $result = $produk->createProduk($produk_id_kat, $produk_id_user, $produk_kode, $produk_nama, $produk_hrg, $produk_keterangan, $produk_stok, $produk_foto);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Error creating product: " . $produk->conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New Product</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="produk_id_kat">Category ID:</label>
                <input type="text" class="form-control" id="produk_id_kat" name="produk_id_kat" required>
            </div>
            <div class="form-group">
                <label for="produk_id_user">User ID:</label>
                <input type="text" class="form-control" id="produk_id_user" name="produk_id_user" required>
            </div>
            <div class="form-group">
                <label for="produk_kode">Product Code:</label>
                <input type="text" class="form-control" id="produk_kode" name="produk_kode" required>
            </div>
            <div class="form-group">
                <label for="produk_nama">Name:</label>
                <input type="text" class="form-control" id="produk_nama" name="produk_nama" required>
            </div>
            <div class="form-group">
                <label for="produk_hrg">Price:</label>
                <input type="text" class="form-control" id="produk_hrg" name="produk_hrg" required>
            </div>
            <div class="form-group">
                <label for="produk_keterangan">Description:</label>
                <textarea class="form-control" id="produk_keterangan" name="produk_keterangan" required></textarea>
            </div>
            <div class="form-group">
                <label for="produk_stok">Stock:</label>
                <input type="text" class="form-control" id="produk_stok" name="produk_stok" required>
            </div>
            <div class="form-group">
                <label for="produk_foto">Photo:</label>
                <input type="file" class="form-control-file" id="produk_foto" name="produk_foto" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back to Product List</a>
        </form>
    </div>
</body>
</html>
