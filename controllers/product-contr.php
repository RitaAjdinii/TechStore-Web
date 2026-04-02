<?php

    include "../classes/dbh.class.php";

    class ProductContr {

        private $dbs;

        public function  __construct(){
            $this->dbs = new Dbh();
        }

        public function createProduct($name,$description,$price){
            $sql = $this->dbs->connect()->prepare('INSERT INTO product(image_file_name,image_file_path,product_name,product_description,product_price) VALUES(?,?,?,?,?)');
            $targetDirectory = "../Images/";
            $imageFileName = basename($_FILES["image"]["name"]);
            $imageFilePath = $targetDirectory.$imageFileName;
            
            if($sql->execute(array($imageFileName,$imageFilePath,$name,$description,$price))){
                $sql=null;
                move_uploaded_file($_FILES['image']['tmp_name'],$imageFilePath);
                header("location:../views/product-add.php/?error=none");
            }
             header("location:../views/product-add.php/?error=stmtfailed");
             exit();
             $sql = null;
        }

        public function getAll(){
            $sql = $this->dbs->connect()->prepare("SELECT * FROM product;");
            if($sql->execute()){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
        }

        public function get($id){
            $sql = $this->dbs->connect()->prepare('SELECT * FROM product WHERE product_id=?');
            if($sql->execute(array($id))){
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
                header("location:../views/product-edit.php/?error=stmtfailed");
                exit();
        }   


        public function edit($productId,$imageFileName,$imageFilePath,$name,$description,$price){
            $sql = $this->dbs->connect()->prepare('UPDATE product SET image_file_name =?,image_file_path=?,product_name=?,product_description=?,product_price=? WHERE product_id =?;');
            if($sql->execute(array($imageFileName,$imageFilePath,$name,$description,$price,$productId))){
             header("location:../views/product-edit.php?id=" . $productId . "&error=none");
            }
             header("location:../views/product-edit.php/?error=stmtfailed");
            exit();
        }

        public function delete($id){
            $sql = $this->dbs->connect()->prepare('DELETE FROM product WHERE product_id=?');
            if($sql->execute(array($id))){
                echo "<h1>Item deleted!</h1>";
                exit();
            }

        }
    }