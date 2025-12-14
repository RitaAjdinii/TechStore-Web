<?php

include "classes/dbh.class.php";

$dbs = new Dbh();

$productId ="";
$productImgFileName="";
$productImgFilePath = "";
$productName="";
$productDescription="";
$productPrice="";

$errorMessage="";
$successMessage="";

$targetDirectory ="images/";

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $productId = $_GET["id"];
    $sql = $dbs->connect()->prepare("SELECT * FROM product WHERE product_id=?;");
     if($sql->execute(array($productId))){      
       $row= $sql->fetch(PDO::FETCH_ASSOC);
        $productImgFileName = $row['image_file_name'];
         $productImgFilePath = $row['image_file_path'];
        $productName = $row['product_name'];
        $productDescription = $row['product_description'];
        $productPrice = $row['product_price'];
    }
    
}else{
    $productId = $_POST["product-id"];
    $productImgFileName = basename($_FILES['image-file-path']["name"]);
    $productImgFilePath = $targetDirectory.$productImgFileName;
    $productName = $_POST['product-name'];
    $productDescription = $_POST['product-description'];
    $productPrice = $_POST['product-price'];

    if(empty($productId)||empty($productImgFilePath) || empty($productName) || empty($productDescription) || empty($productPrice)){
        echo "<h1>All fields are required!!!</h1>";
    }else{
        $sql = $dbs->connect()->prepare("UPDATE product SET image_file_name =?,image_file_path=?,product_name=?,product_description=?,product_price=? WHERE product_id =?;");
        if($sql->execute(array($productImgFileName,$productImgFilePath,$productName,$productDescription,$productPrice,$productId))){
            echo "<h1>SQL executed successfully!!!</h1>";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>Product Edit</h1>
    <form  method="post" enctype="multipart/form-data">
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
        <button><a href="AdminDashboard.php">Cancel</a></button>
    </form> 

    <script src="admin-navbar.js"></script>
</body>
</html>