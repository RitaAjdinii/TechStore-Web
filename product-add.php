
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>Create product</h1>
    <form action="includes/product.inc.php" method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
             <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"><br>
        <label>Product name:</label>
        <input type="text" name="product-name"><br>
        <label>Description</label>
        <textarea  name="product-description"></textarea>
        <label >Product price:</label>
        <input type="number" min="0" step="0.1" name="product-price">
        <button type="submit" name="submit">Create</button>
        <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
    <script src="admin-navbar.js"> </script>
</body>
</html>