<?php

if(isset($_POST["submit"])){
    
    $name = $_POST['username'];
    $password = $_POST['password'];
     $email= $_POST['email'];
     $location = $_POST['location'];
      $birthdate = $_POST['birthdate'];
    

      include "../classes/dbh.class.php";
      include "../classes/signup.class.php";
      include "../classes/signup-contr.class.php";

      $signup = new SignupContr($name,$location,$birthdate,$email,$password);

      $signup->signupUser();
       header("location:../index.php?error=none");

}