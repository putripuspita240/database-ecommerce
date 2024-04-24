<?php
require_once '../config.php';
require_once '../order.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim melalui metode POST
    $order_id = $_POST['order_id'];
    $order_id_user = $_POST['order_id_user'];
    $order_tgl = $_POST['order_tgl'];
    $order_kode = $_POST['order_kode'];
    $order_ttl = $_POST['order_ttl'];
    $order_kurir = $_POST['order_kurir'];
    $order_ongkir = $_POST['order_ongkir'];
    $order_byr_deadline = $_POST['order_byr_deadline'];
    $order_batal = $_POST['order_batal'];

    // Membuat objek dari kelas Order
    $order = new Order();

    // Memanggil method updateOrder() untuk mengupdate order
    $result = $order->updateOrder($order_id, $order_id_user, $order_tgl, $order_kode, $order_ttl, $order_kurir, $order_ongkir, $order_byr_deadline, $order_batal);

    // Menangani hasil operasi
    if ($result) {
        // Jika berhasil, redirect ke halaman index.php atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error updating order: " . $order->conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Order</h2>
        <?php
            // Mendapatkan ID order yang akan diupdate dari parameter GET
            $order_id = $_GET['id'];

            // Memuat data order dari database menggunakan ID
            require_once '../config.php';
            require_once '../order.php';
            require_once '../users.php';

            $usersObj = new Users();
            $users = $usersObj->getAllUsers();

            $order = new Order();
            $orderData = $order->getOrderById($order_id);
        ?>
        <form action="" method="POST">
            <!-- Menyimpan ID order dalam input hidden -->
            <input type="hidden" name="order_id" value="<?php echo $orderData['order_id']; ?>">
            <div class="form-group">
                <label for="order_id_user">User ID:</label>
                <select class="form-control" name="order_id_user" id="order_id_user">
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['user_id']; ?>" <?php if ($orderData['order_id_user'] == $user['user_id']) echo "selected"; ?>><?php echo $user['user_nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="order_tgl">Order Date:</label>
                <input type="date" class="form-control" id="order_tgl" name="order_tgl" value="<?php echo $orderData['order_tgl']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_kode">Order Code:</label>
                <input type="text" class="form-control" id="order_kode" name="order_kode" value="<?php echo $orderData['order_kode']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_ttl">Total:</label>
                <input type="text" class="form-control" id="order_ttl" name="order_ttl" value="<?php echo $orderData['order_ttl']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_kurir">Courier:</label>
                <input type="text" class="form-control" id="order_kurir" name="order_kurir" value="<?php echo $orderData['order_kurir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_ongkir">Shipping Cost:</label>
                <input type="text" class="form-control" id="order_ongkir" name="order_ongkir" value="<?php echo $orderData['order_ongkir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_byr_deadline">Payment Deadline:</label>
                <input type="date" class="form-control" id="order_byr_deadline" name="order_byr_deadline" value="<?php echo $orderData['order_byr_deadline']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_batal">Cancel Order:</label>
                <select class="form-control" id="order_batal" name="order_batal">
                    <option value="0" <?php if ($orderData['order_batal'] == 0) echo "selected"; ?>>No</option>
                    <option value="1" <?php if ($orderData['order_batal'] == 1) echo "selected"; ?>>Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
