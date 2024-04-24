<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Order</title>
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
                    <a class="nav-link active" href="">Order</a>
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
        <h2 class="mb-4">Order List</h2>
        <a href="create.php" class="btn btn-primary mb-4">Add New Order</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Order Code</th>
                    <th>Total</th>
                    <th>Courier</th>
                    <th>Shipping Cost</th>
                    <th>Payment Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../config.php';
                require_once '../order.php';

                $order = new Order();
                $orders = $order->getAllOrders();

                foreach ($orders as $ord) {
                    echo "<tr>";
                    echo "<td>" . $ord['order_id'] . "</td>";

                    // Mendapatkan nama user berdasarkan ID user
                    $user_id = $ord['order_id_user'];
                    $sql = "SELECT user_nama FROM tb_users WHERE user_id = '$user_id'";
                    $result = $order->conn->query($sql);
                    $user = $result->fetch_assoc();

                    echo "<td>" . $user['user_nama'] . "</td>"; // Menampilkan nama user
                    echo "<td>" . $ord['order_kode'] . "</td>";
                    echo "<td>" . $ord['order_ttl'] . "</td>";
                    echo "<td>" . $ord['order_kurir'] . "</td>";
                    echo "<td>" . $ord['order_ongkir'] . "</td>";
                    echo "<td>" . $ord['order_byr_deadline'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $ord['order_id'] . "' class='btn btn-sm btn-info'>Update</a>
                            <form method='POST' action='delete.php' style='display: inline;' onsubmit='return confirm(\"Are you sure?\")'>
                                <input type='hidden' name='order_id' value='" . $ord['order_id'] . "'>
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
