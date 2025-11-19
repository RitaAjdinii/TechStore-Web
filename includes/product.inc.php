<?php


if(isset($_POST["submit"])){

     $image =$_FILES['image'];
     $name = $_POST['product-name'];
     $description= $_POST['product-description'];
     $price = $_POST['product-price'];

     
     
     $targetDirectory = "../images/";
     $imageFileName = basename($_FILES["image"]["name"]);
     $imageFilePath = $targetDirectory.$imageFileName;
     
    include "../classes/dbh.class.php";
    include "../classes/product.class.php";
    include "../classes/product-contr.php";

    $product = new ProductContr($imageFileName,$imageFilePath,$name,$description,$price);
      $product->createProduct();
       header("location:../product-add.php?error=none");
       echo "<h1>Congrats.your data has been submited!!!</h1>";

}