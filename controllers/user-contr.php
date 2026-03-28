<?php
 include "../classes/dbh.class.php";
class UserContr {

private $dbs;

public function __construct(){
    $this->dbs = new Dbh();
}


public function getAll(){
    $sql = $this->dbs->connect()->prepare("SELECT * FROM user;");
    if($sql->execute()){
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}

public function get($id){
    $sql = $this->dbs->connect()->prepare("SELECT * FROM user WHERE user_id=?;");
    if($sql->execute(array($id))){      
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}

public function edit($name,$password,$email,$location,$birthdate,$isAdmin,$id){
   if(!empty($password)){
                $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                 $sql=$this->dbs->connect()->prepare("UPDATE user SET user_name=?,user_password=?,user_email=?,user_location=?,user_birthdate=?,user_isAdmin=? WHERE user_id=?;");
                 if($sql->execute(array($name,$hashedPassword,$email,$location,$birthdate,$isAdmin,$id))){
                    echo "<h1>Hashed Executed properly</h1>";
                 }
            }else{
                 $sql=$this->dbs->connect()->prepare("UPDATE user SET user_name=?,user_email=?,user_location=?,user_birthdate=?,user_isAdmin=? WHERE user_id=?;");
                 if($sql->execute(array($name,$email,$location,$birthdate,$isAdmin,$id))){
                    echo "<h1>SQL Executed properly</h1>";
                 }
            }
}

public function delete($id){
    $sql = $this->dbs->connect()->prepare("DELETE FROM user WHERE user_id=?;");
    if($sql->execute(array($id))){
        echo "<h1>Item deleted!!!</h1>";
        exit();
    }
}
}


