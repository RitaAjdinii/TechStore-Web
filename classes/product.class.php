<?php

class Product extends Dbh{

    protected function setProduct($image,$name,$description,$price){
      $statement = $this->connect()->prepare('INSERT INTO product(product_image,product_name,product_description,product_price) VALUES(?,?,?,?)');

        if(!$statement->execute(array($image,$name,$description,$price))){
            $statement=null;
            header("location:../product-add.php/?error=stmtfailed");
            exit();
        }

        $statement =null;

    }

}