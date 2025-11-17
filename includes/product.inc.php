<?php

if(isset($_POST["submit"])){

     $image = $_POST['product-image'];
     $name = $_POST['product-name'];
     $description= $_POST['product-description'];
     $price = $_POST['price'];
    include "../classes/dbh.class.php";
    include "../classes/product.class.php";
    include "../classes/product-contr.php";

    $product = new ProductContr($image,$name,$description,$price);
      $product->createProduct();
       header("location:../product-add.php?error=none");
       echo "<h1>Congrats.your data has been submited!!!</h1>";

}