<?php


if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "..\controllers\login-contr.php";

    
  session_start();
  $login = new loginContr($email,$password);

  $login->loginUser();
     header("location:../views/Home.php");
  
  
  
 


  


}
