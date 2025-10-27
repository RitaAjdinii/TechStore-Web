<?php

class Signup extends Dbh{

    protected function setUser($username,$location,$birthdate,$email,$password,$isAdmin){
        $stmt = $this->connect()->prepare('INSERT INTO user(user_name,user_location,user_birthdate,user_email,user_password,user_isAdmin) VALUES(?,?,?,?,?,?)');

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username,$location,$birthdate,$email,$hashedPassword,$isAdmin))){
            $stmt=null;
            header("location:../Signup.php/?error=stmtfailed");
            exit();
        }

        $stmt=null;
    }

}