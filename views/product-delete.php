
<?php


require_once "../controllers/product-contr.php";
$product= new ProductContr();

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $product->delete($id);
}

