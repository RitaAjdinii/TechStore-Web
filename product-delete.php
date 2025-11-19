
<?php

include "classes/dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();
if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM product WHERE product_id=$id";
   $result =  $connection->prepare($sql);
    if($result->execute()){
        echo "<h1>Item deleted!!!</h1>";
        exit();
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
    <h1>Product Delete</h1>
    <form  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $productId?>" name="product-id">
        <label >Product image:</label>
        <input type="file" name="image-file-path" value="<?php echo $productImgFilePath?>" accept="image/jpeg,image/png,image/jpg,image/webp" >
        <br>
        <label >Product name:</label>
        <input type="text" name="product-name" value="<?php echo $productName?>">
        <br>
        <label >Product description:</label>
        <input type="text" name="product-description" value="<?php echo $productDescription?>">
        <br>
        <label >Product price:</label>
        <input  type="number"  name="product-price" min="0" step="0.1" value="<?php echo $productPrice?>"><br>
        <button type="submit">Submit</button>
        <button><a href="AdminDashboard.php">Cancel</a></button>
    </form> 

    <script src="admin-navbar.js"></script>
</body>
</html>