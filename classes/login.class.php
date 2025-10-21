<?php

class Login extends Dbh{

    protected function getUser($email,$password){

        $stmt = $this->connect()->prepare('SELECT user_password FROM user WHERE user_email=? OR user_username=?;');
         // $stmt = $this->connect()->prepare('SELECT users_pwd FROM users where users_uid=? OR users_email=?;');

        if(!$stmt->execute(array($email,$email))){
            $stmt = null;
            header("location: ../Login.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = null;

            header("location: ../Login.php?error=usernotfound");
            exit(); 
        }

          $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $checkPassword= password_verify($password,$passwordHashed[0]["user_password"]);


        if($checkPassword==false){
            $stmt = null;
            header("location: ../Login.php?error=wrongpassword");
            exit();
        }
        else{
            $stmt = $this->connect()->prepare('SELECT user_password,user_email,user_id FROM user WHERE (user_email=? OR user_username = ?)AND user_password=?;');

            if(!$stmt->execute(array($email,$email,$passwordHashed[0]["user_password"]))){
                $stmt =null;

                header("location: ../Login.php?error=stmtfailed");
                exit();

            }

            if($stmt->rowCount()==0){
                $stmt = null;
                header("location: ../Login.php?error=DionMaIqARTI");
                exit();
            }//qekjo garant osht duplicate

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["useremail"] = $user[0]["user_email"];
        }
 
        $stmt= null;

       

    }




}