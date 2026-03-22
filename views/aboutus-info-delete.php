<?php


include "classes/dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();
if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM about_us_info WHERE about_us_info_id=$id";
   $result =  $connection->prepare($sql);
    if($result->execute()){
        echo "<h1>Item deleted!!!</h1>";
    exit();
    }
}

