<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New Order Detail</h2>
        <form action="process_create.php" method="POST">
            <div class="form-group">
                <label for="detail_id_order">Order ID:</label>
                <input type="text" class="form-control" id="detail_id_order" name="detail_id_order" required>
            </div>
            <div class="form-group">
                <label for="detail_id_produk">Product ID:</label>
                <input type="text" class="form-control" id="detail_id_produk" name="detail_id_produk" required>
            </div>
            <div class="form-group">
                <label for="detail_harga">Price:</label>
                <input type="text" class="form-control" id="detail_harga" name="detail_harga" required>
            </div>
            <div class="form-group">
                <label for="detail_jml">Quantity:</label>
                <input type="text" class="form-control" id="detail_jml" name="detail_jml" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back to Order Detail List</a>
        </form>
    </div>
</body>
</html>
