<?php

require_once("../controllers/product-contr.php");

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $product = new ProductContr();
    $product->restore($id);
    
}