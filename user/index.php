<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
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
                    <a class="nav-link active" href="">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../product/index.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../order/index.php">Order</a>
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
        <h2>List of Users</h2>
        <a href="create.php" class="btn btn-primary mb-4">Add New User</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetch users data from backend and populate table rows -->
                <?php
                require_once '../config.php';
                require_once '../users.php';

                $usersObj = new Users();
                $users = $usersObj->getAllUsers();

                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['user_id'] . "</td>";
                    echo "<td>" . $user['user_email'] . "</td>";
                    echo "<td>" . $user['user_nama'] . "</td>";
                    echo "<td>" . $user['user_alamat'] . "</td>";
                    echo "<td>" . $user['user_hp'] . "</td>";
                    echo "<td>" . ($user['user_pos'] == 1 ? 'Manager' : ($user['user_pos'] == 2 ? 'Supervisor' : 'Staff')) . "</td>";
                    echo "<td>" . ($user['user_role'] ? 'Admin' : 'User') . "</td>";
                    echo "<td>" . ($user['user_aktif'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $user['user_id'] . "' class='btn btn-sm btn-info'>Update</a>
                            <form action='delete.php' method='POST' style='display: inline;' onsubmit='return confirm(\"Are you sure?\")'>
                                <input type='hidden' name='user_id' value='" . $user['user_id'] . "'>
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
