<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New Order</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="order_id_user">User ID:</label>
                <select class="form-control" name="order_id_user" id="order_id_user">
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['user_id']; ?>"><?php echo $user['user_nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="order_tgl">Order Date:</label>
                <input type="date" class="form-control" id="order_tgl" name="order_tgl">
            </div>
            <div class="form-group">
                <label for="order_kode">Order Code:</label>
                <input type="text" class="form-control" id="order_kode" name="order_kode">
            </div>
            <div class="form-group">
                <label for="order_ttl">TTL:</label>
                <select class="form-control" name="order_ttl" id="order_ttl">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order_kurir">Courier:</label>
                <input type="text" class="form-control" id="order_kurir" name="order_kurir">
            </div>
            <div class="form-group">
                <label for="order_ongkir">Shipping Cost:</label>
                <input type="text" class="form-control" id="order_ongkir" name="order_ongkir">
            </div>
            <div class="form-group">
                <label for="order_byr_deadline">Payment Deadline:</label>
                <input type="date" class="form-control" id="order_byr_deadline" name="order_byr_deadline">
            </div>
            <div class="form-group">
                <label for="order_batal">Cancel Order:</label>
                <select class="form-control" name="order_batal" id="order_batal">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back to Order List</a>
        </form>
    </div>
</body>
</html>
