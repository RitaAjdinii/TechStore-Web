<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php

  
        if(isset($_POST["submit"])){
            $name = $_POST['product-name'];
            $description= $_POST['product-description'];
            $price = $_POST['product-price'];
            $createdBy = $_SESSION['username'];
            require_once "../controllers/product-contr.php";

            $product = new ProductContr();
            $product->createProduct($name,$description,$price,$createdBy);
            echo "<h1>Congrats.your data has been submited!!!</h1>";
        }
    ?>

    <?php include "../views/adminHeader.php";?>
        <main class="crud-form-body">
    <h1>Create product</h1>
    <form method="post" enctype="multipart/form-data" class="crud-form">
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
</main>
</body>
</html>