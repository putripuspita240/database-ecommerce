<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PEMWEB Putri 🚀</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../user/index.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../order/index.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../order-detail/index.php">Order Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../keranjang/index.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kategori/index.php">Categories</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Product List</h2>
        <a href="create.php" class="btn btn-primary mb-4">Add New Product</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>User ID</th>
                    <th>Product Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../config.php';
                require_once '../produk.php';

                $produk = new Produk();
                $produks = $produk->getAllProduk();

                foreach ($produks as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod['produk_id'] . "</td>";
                    echo "<td>" . $prod['produk_id_kat'] . "</td>";
                    echo "<td>" . $prod['produk_id_user'] . "</td>";
                    echo "<td>" . $prod['produk_kode'] . "</td>";
                    echo "<td>" . $prod['produk_nama'] . "</td>";
                    echo "<td>" . $prod['produk_hrg'] . "</td>";
                    echo "<td>" . $prod['produk_keterangan'] . "</td>";
                    echo "<td>" . $prod['produk_stok'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . $prod['produk_foto'] . "' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>";
                    echo "<td>
                            <a href='edit.php?id=" . $prod['produk_id'] . "' class='btn btn-sm btn-info'>Update</a>
                            <form method='POST' action='delete.php' style='display: inline;' onsubmit='return confirm(\"Are you sure?\")'>
                                <input type='hidden' name='produk_id' value='" . $prod['produk_id'] . "'>
                                <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
