<?php
include "../classes/dbh.class.php";

class CartContr
{


    private $dbs;

    public function __construct()
    {
        $this->dbs = new Dbh();
    }

    public function addToCart($productId, $userId)
    {
        $sql = $this->dbs->connect()->prepare('INSERT INTO cart(product_id,user_id)VALUES(?,?)');
        if ($sql->execute(array($productId, $userId))) {
            echo "<script>alert('Item added to cart');</script>";
        }
    }

    public function getAll($userId)
    {
        $sql = $this->dbs->connect()->prepare("SELECT p.*, c.cart_id FROM cart c JOIN product p ON c.product_id = p.product_id WHERE c.user_id = ?");
        if ($sql->execute(array($userId))) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }


    public function cartCheckout($productId, $quantity)
    {
        $priceSql = $this->dbs->connect()->prepare('SELECT product_price from product WHERE product_id =?;');
        if ($priceSql->execute(array($productId))) {
            $purchasePrice = $priceSql->fetch(PDO::FETCH_ASSOC);
            $sql = $this->dbs->connect()->prepare('INSERT INTO purchases(product_id,quantity,user_id,purchase_price) VALUES(?,?,?,?)');
            if ($sql->execute(array($productId, $quantity, $_SESSION['userid'], $purchasePrice["product_price"]))) {
                echo "";
            }
        }
    }
}
