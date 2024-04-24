<?php
require_once '../config.php';
require_once '../users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $user_id = $_POST['user_id'];

    // Membuat objek dari kelas Users
    $usersObj = new Users();

    // Memanggil method deleteUser() untuk menghapus user
    $result = $usersObj->deleteUser($user_id);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error deleting user: " . $usersObj->conn->error;
    }
}
?>
