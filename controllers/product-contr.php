<?php

    include "../classes/dbh.class.php";

    class ProductContr {

        private $dbs;

        public function  __construct(){
            $this->dbs = new Dbh();
        }

        public function createProduct($imageFileName,$imageFilePath,$name,$description,$price){
            $statement = $this->dbs->connect()->prepare('INSERT INTO product(image_file_name,image_file_path,product_name,product_description,product_price) VALUES(?,?,?,?,?)');

            if(!$statement->execute(array($imageFileName,$imageFilePath,$name,$description,$price))){
                $statement=null;
                header("location:../views/product-add.php/?error=stmtfailed");
                exit();
            }

            $statement =null;
        }

        public function getAll(){
            $productSql = $this->dbs->connect()->prepare("SELECT * FROM product;");
            if($productSql->execute()){
                return $productSql->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }

        public function get($id){
            $productSql = $this->dbs->connect()->prepare('SELECT * FROM product WHERE product_id=?');
            if($productSql->execute(array($id))){
                return $productSql->fetch(PDO::FETCH_ASSOC);
            }
                header("location:../views/product-edit.php/?error=stmtfailed");
                exit();
        }   


        public function edit($productId,$imageFileName,$imageFilePath,$name,$description,$price){
            $productSql = $this->dbs->connect()->prepare('UPDATE product SET image_file_name =?,image_file_path=?,product_name=?,product_description=?,product_price=? WHERE product_id =?;');
            if($productSql->execute(array($imageFileName,$imageFilePath,$name,$description,$price,$productId))){
             header("location:../views/product-edit.php?id=" . $productId . "&error=none");
            exit();
             }
             header("location:../views/product-edit.php/?error=stmtfailed");
            exit();
        }

        public function delete($id){
            $productSql = $this->dbs->connect()->prepare('DELETE FROM product WHERE product_id=?');
            if($productSql->execute(array($id))){
                echo "<h1>Item deleted!</h1>";
                exit();
            }

        }
    }