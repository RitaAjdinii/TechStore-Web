<?php

    include "../classes/dbh.class.php";

    class ProductContr {

        private $dbs;

        public function  __construct(){
            $this->dbs = new Dbh();
        }

        public function createProduct($name,$description,$price,$createdBy){
            $sql = $this->dbs->connect()->prepare('INSERT INTO product(image_file_name,image_file_path,product_name,product_description,product_price,created_by) VALUES(?,?,?,?,?,?)');
            $targetDirectory = "../Images/";
            $imageFileName = basename($_FILES["image"]["name"]);
            $imageFilePath = $targetDirectory.$imageFileName;
            
            if($sql->execute(array($imageFileName,$imageFilePath,$name,$description,$price,$createdBy))){
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


        public function edit($productId,$imageFileName,$imageFilePath,$name,$description,$price,$editedBy){
            $sql = $this->dbs->connect()->prepare('UPDATE product SET image_file_name =?,image_file_path=?,product_name=?,product_description=?,product_price=?,edited_by=? WHERE product_id =?;');
            if($sql->execute(array($imageFileName,$imageFilePath,$name,$description,$price,$editedBy,$productId))){
             header("location:../views/product-edit.php?id=" . $productId . "&error=none");
            }
             header("location:../views/product-edit.php/?error=stmtfailed");
            exit();
        }

        public function delete($deletedBy,$id){
        $sql = $this->dbs->connect()->prepare('UPDATE product SET deleted_at = NOW(),deleted_by=? WHERE product_id=?;');
        if($sql->execute(array($deletedBy,$id))){
            echo "<h1>The item has been removed from the page</h1>";
        }
        }

        public function forceDelete($id){
        $sql = $this->dbs->connect()->prepare('DELETE FROM product WHERE product_id=?;');
        if($sql->execute(array($id))){
             echo "<h1>Deleted successfully</h1>";
                }
             }

        public function restore($id){
            $sql = $this->dbs->connect()->prepare('UPDATE product SET deleted_at=NULL,deleted_by=NULL WHERE product_id=?;');
            if($sql->execute(array($id))){
            echo "<h1>The item has been removed from the page</h1>";
        }
        }

        public function getDelete(){
            $sql = $this->dbs->connect()->prepare('SELECT * FROM product WHERE deleted_at IS NULL;');
            if($sql->execute()){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        } 



    }