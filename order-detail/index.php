<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Order Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        th {
            background-color: #f2f2f2;
        }
    </style>
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
                    <a class="nav-link" href="../product/index.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../order/index.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Order Detail</a>
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
        <h2 class="mb-4">Order Detail List</h2>
        <a href="create.php" class="btn btn-primary mb-4">Add New Order Detail</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../config.php';
                require_once '../orderDetail.php';

                $orderDetail = new OrderDetail();
                $orderDetails = $orderDetail->getAllOrderDetails();

                foreach ($orderDetails as $detail) {
                    echo "<tr>";
                    echo "<td>" . $detail['detail_id'] . "</td>";
                    echo "<td>" . $detail['detail_id_order'] . "</td>";
                    echo "<td>" . $detail['detail_id_produk'] . "</td>";
                    echo "<td>" . $detail['detail_harga'] . "</td>";
                    echo "<td>" . $detail['detail_jml'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $detail['detail_id'] . "' class='btn btn-sm btn-info'>Update</a>
                            <form method='POST' action='delete.php' style='display: inline;' onsubmit='return confirm(\"Are you sure?\")'>
                                <input type='hidden' name='detail_id' value='" . $detail['detail_id'] . "'>
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
