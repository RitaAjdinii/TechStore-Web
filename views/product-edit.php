<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php
        require_once "../controllers/product-contr.php";

        $product = new ProductContr();
        $targetDirectory ="Images/";

        $productId = $_GET["id"];
        $row = $product->get($productId);

        $productImgFileName = $row['image_file_name'];
        $productImgFilePath = $row['image_file_path'];
        $productName = $row['product_name'];
        $productDescription = $row['product_description'];
        $productPrice = $row['product_price'];

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $productId = $_POST["product-id"];
            $imageFileName = basename($_FILES['image-file-path']["name"]);
            $imageFilePath = $targetDirectory.$productImgFileName;
            $name= $_POST['product-name'];
            $description = $_POST['product-description'];
            $price = $_POST['product-price'];

            $product->edit($productId,$imageFileName,$imageFilePath,$name,$description,$price);
        } 
    ?>

    <?php include "adminHeader.php";?>
    <h1>Product Edit</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $productId?>" name="product-id">
        <label >Product image:</label>
        <input type="file" name="image-file-path" value="<?php echo $productImgFilePath?>" accept="image/jpeg,image/png,image/jpg,image/webp" >
        <br>
        <label >Product name:</label>
        <input type="text" name="product-name" value="<?php echo $productName?>">
        <br>
        <label >Product description:</label>
        <textarea type="text" name="product-description" ><?php echo $productDescription?></textarea>
        <br>
        <label >Product price:</label>
        <input  type="number"  name="product-price" min="0" step="0.01" value="<?php echo $productPrice?>"><br>
        <button type="submit">Submit</button>
        <a href="AdminDashboard.php">Cancel</a>
    </form> 
</body>
</html>