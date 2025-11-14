<?php

include "dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM user WHERE user_id=$id";
   $result =  $connection->prepare($sql);
    if($result->execute()){
        header("../AdminDashboard.php");
        echo "<h1>Item deleted!!!</h1>";
        exit();
    }
}