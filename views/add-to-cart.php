<?php

session_start();
require_once('../controllers/cart-contr.php');


$cart = new CartContr();
$productId = $_POST["product-id"];
$userId = $_SESSION['userid'];

if($_SERVER["REQUEST_METHOD"]=='POST'){

$cart->addToCart($productId,$userId);

}