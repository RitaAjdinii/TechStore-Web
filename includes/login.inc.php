<?php


if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.php";

    
  session_start();
  $login = new loginContr($email,$password);

  $login->loginUser();

  if($_SESSION["userAdmin"]==1){
    header("location:../AdminDashboard.php");
  }else{
    header("location:../ContactUs.php");
  }
  
 
 // $login->loginUser();

  


}
