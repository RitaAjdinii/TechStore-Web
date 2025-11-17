
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Create product</h1>
    <form action="includes/product.inc.php" method="post">
        <label >Choose image:</label>
        <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="product-image"><br>
        <label>Product name:</label>
        <input type="text" name="product-name"><br>
        <label>Description</label>
        <textarea  name="product-description"></textarea>
        <label >Product price:</label>
        <input type="number" min="0" step="0.1" name="price">
        <button type="submit" name="submit">Create</button>
        <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>