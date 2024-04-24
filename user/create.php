<?php
require_once '../config.php';
require_once '../users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_nama = $_POST['user_nama'];
    $user_alamat = $_POST['user_alamat'];
    $user_hp = $_POST['user_hp'];
    $user_pos = $_POST['user_pos'];
    $user_role = $_POST['user_role'];
    $user_aktif = $_POST['user_aktif'];

    // Membuat objek dari kelas User
    $user = new Users();

    // Memanggil method createUser() untuk menambah user
    $result = $user->createUser($user_email, $user_password, $user_nama, $user_alamat, $user_hp, $user_pos, $user_role, $user_aktif);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error creating user.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New User</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="email" class="form-control" id="user_email" name="user_email" required>
            </div>
            <div class="form-group">
                <label for="user_password">Password:</label>
                <input type="password" class="form-control" id="user_password" name="user_password" required>
            </div>
            <div class="form-group">
                <label for="user_nama">Name:</label>
                <input type="text" class="form-control" id="user_nama" name="user_nama" required>
            </div>
            <div class="form-group">
                <label for="user_alamat">Address:</label>
                <input type="text" class="form-control" id="user_alamat" name="user_alamat" required>
            </div>
            <div class="form-group">
                <label for="user_hp">Phone:</label>
                <input type="text" class="form-control" id="user_hp" name="user_hp" required>
            </div>
            <div class="form-group">
                <label for="user_pos">Position:</label>
                <select class="form-control" id="user_pos" name="user_pos">
                    <option value="1">Manager</option>
                    <option value="2">Supervisor</option>
                    <option value="3">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_role">Role:</label>
                <select class="form-control" id="user_role" name="user_role">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_aktif">Status:</label>
                <select class="form-control" id="user_aktif" name="user_aktif">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back to User List</a>
        </form>
    </div>
</body>
</html>
