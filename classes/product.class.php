<?php

class Product extends Dbh{

    protected function setProduct($imageFileName,$imageFilePath,$name,$description,$price){
      $statement = $this->connect()->prepare('INSERT INTO product(image_file_name,image_file_path,product_name,product_description,product_price) VALUES(?,?,?,?,?)');

        if(!$statement->execute(array($imageFileName,$imageFilePath,$name,$description,$price))){
            $statement=null;
            header("location:../product-add.php/?error=stmtfailed");
            exit();
        }

        $statement =null;

    }

}