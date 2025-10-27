<?php


if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.php";


  $login = new loginContr($email,$password);
  session_start();
  $login->loginUser();
  if($_SESSION["userAdmin"]==1){

  header("location:../AdminDashboard.php");

  }else{
    header("location:../Home.php");
  }
 
 // $login->loginUser();

  


}
