<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Update User</h2>
        <?php
        // Mendapatkan ID user yang akan diupdate dari parameter GET
        $user_id = $_GET['id'];

        // Memuat data user dari database menggunakan ID
        require_once '../config.php';
        require_once '../users.php';

        $usersObj = new Users();
        $user = $usersObj->getUserById($user_id);
        ?>

        <form action="" method="POST">
            <!-- Menyimpan ID user dalam input hidden -->
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">

            <!-- Input fields untuk data user yang dapat diupdate -->
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo $user['user_email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="user_password">Password:</label>
                <input type="password" class="form-control" id="user_password" name="user_password" value="<?php echo $user['user_password']; ?>" required>
            </div>

            <div class="form-group">
                <label for="user_nama">Name:</label>
                <input type="text" class="form-control" id="user_nama" name="user_nama" value="<?php echo $user['user_nama']; ?>" required>
            </div>

            <div class="form-group">
                <label for="user_alamat">Address:</label>
                <input type="text" class="form-control" id="user_alamat" name="user_alamat" value="<?php echo $user['user_alamat']; ?>" required>
            </div>

            <div class="form-group">
                <label for="user_hp">Phone:</label>
                <input type="text" class="form-control" id="user_hp" name="user_hp" value="<?php echo $user['user_hp']; ?>" required>
            </div>

            <div class="form-group">
                <label for="user_pos">Position:</label>
                <select class="form-control" id="user_pos" name="user_pos">
                    <option value="1" <?php if ($user['user_pos'] == 1) echo "selected"; ?>>Manager</option>
                    <option value="2" <?php if ($user['user_pos'] == 2) echo "selected"; ?>>Supervisor</option>
                    <option value="3" <?php if ($user['user_pos'] == 3) echo "selected"; ?>>Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_role">Role:</label>
                <select class="form-control" id="user_role" name="user_role">
                    <option value="1" <?php if ($user['user_role'] == 1) echo "selected"; ?>>Admin</option>
                    <option value="0" <?php if ($user['user_role'] == 0) echo "selected"; ?>>User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_aktif">Active:</label>
                <select class="form-control" id="user_aktif" name="user_aktif" required>
                    <option value="1" <?php if ($user['user_aktif'] == 1) echo "selected"; ?>>Yes</option>
                    <option value="0" <?php if ($user['user_aktif'] == 0) echo "selected"; ?>>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
