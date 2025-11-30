<?php


include "classes/dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();
if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM contact_us WHERE contact_id=$id";
   $result =  $connection->prepare($sql);
    if($result->execute()){
        echo "<h1>Item deleted!!!</h1>";
    exit();
    }
}

