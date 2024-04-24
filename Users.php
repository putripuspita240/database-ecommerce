<?php
require_once 'config.php';

class Users {
    public $conn;

    public function __construct() {
        $config = new Config();
        $this->conn = $config->getConnection();
    }

    // Method untuk menambah user baru
    public function createUser($user_email, $user_password, $user_nama, $user_alamat, $user_hp, $user_pos, $user_role, $user_aktif) {
        // Tanggal dan waktu saat ini
        $currentDateTime = date('Y-m-d H:i:s');

        // Query untuk menambah user baru dengan created_at dan updated_at
        $sql = "INSERT INTO tb_users (user_email, user_password, user_nama, user_alamat, user_hp, user_pos, user_role, user_aktif, created_at, updated_at) 
                VALUES ('$user_email', '$user_password', '$user_nama', '$user_alamat', '$user_hp', '$user_pos', '$user_role', '$user_aktif', '$currentDateTime', '$currentDateTime')";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil user berdasarkan ID
    public function getUserById($user_id) {
        $sql = "SELECT * FROM tb_users WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Method untuk mengupdate user
    public function updateUser($user_id, $user_email, $user_password, $user_nama, $user_alamat, $user_hp, $user_pos, $user_role, $user_aktif) {
        // Tanggal dan waktu saat ini
        $currentDateTime = date('Y-m-d H:i:s');

        // Query untuk mengupdate user dengan updated_at
        $sql = "UPDATE tb_users SET user_email = '$user_email', user_password = '$user_password', user_nama = '$user_nama', user_alamat = '$user_alamat', 
                user_hp = '$user_hp', user_pos = '$user_pos', user_role = '$user_role', user_aktif = '$user_aktif', updated_at = '$currentDateTime' 
                WHERE user_id = '$user_id'";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus user
    public function deleteUser($user_id) {
        $sql = "DELETE FROM tb_users WHERE user_id = '$user_id'";
        return $this->conn->query($sql);
    }

    // Method untuk mengambil semua user
    public function getAllUsers() {
        $sql = "SELECT * FROM tb_users";
        $result = $this->conn->query($sql);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
}
?>
