<?php
session_start();
require_once "../controllers/cart-contr.php";
$cart = new CartContr();



if (isset($_POST["submit"])) {
    foreach ($_POST as $key => $quantity) {
        $productId = explode("_", $key);
        if (isset($productId[1])) {
            $cart->cartCheckout($productId[1], $quantity);
        }
    }
}
