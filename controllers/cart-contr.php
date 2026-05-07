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

    public function clearUserCart($userId)
    {
        $sql = $this->dbs->connect()->prepare("DELETE FROM cart WHERE user_id = ?");
        $sql->execute(array($userId));
    }

    public function getUsername($id)
    {
        $sql = $this->dbs->connect()->prepare('SELECT user_name FROM user WHERE user_id=?;');
        if ($sql->execute(array($id))) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row['user_name'];
            }
        }
        return null;
    }

    public function getAllPurchases()
    {
        $sql = $this->dbs->connect()->prepare('SELECT * FROM purchases;');

        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function getUserPurchases($id)
    {
        $sql = $this->dbs->connect()->prepare("
            SELECT 
                p.purchase_id, 
                p.quantity, 
                p.purchase_price, 
                p.product_id, 
                p.user_id, 
                p.paid_at,
                u.user_email, 
                u.user_location, 
                u.user_birthdate,
                prod.product_name
            FROM purchases p
            INNER JOIN user u ON p.user_id = u.user_id
            INNER JOIN product prod ON p.product_id = prod.product_id
            WHERE p.user_id = ?;
        ");

        if ($sql->execute(array($id))) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }
}
