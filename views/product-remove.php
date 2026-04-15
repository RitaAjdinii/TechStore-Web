
<?php

session_start();
require_once "../controllers/product-contr.php";
$product= new ProductContr();

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $deletedBy = $_SESSION['username'];
    $product->delete($deletedBy,$id);
}

