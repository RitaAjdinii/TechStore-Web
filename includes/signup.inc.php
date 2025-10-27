<?php

if(isset($_POST["submit"])){
    $isAdmin;

    $name = $_POST['username'];
    $password = $_POST['password'];
     $email= $_POST['email'];
     $location = $_POST['location'];
      $birthdate = $_POST['birthdate'];
       if(isset($_POST["isAdmin"])){
        $isAdmin = 1;
        }else{
            $isAdmin = 0;
        }
    

      include "../classes/dbh.class.php";
      include "../classes/signup.class.php";
      include "../classes/signup-contr.class.php";

      $signup = new SignupContr($name,$location,$birthdate,$email,$password,$isAdmin);

      $signup->signupUser();
       header("location:../index.php?error=none");

}