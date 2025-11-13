<?php

include "dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM user WHERE id=$id";
    $connection->prepare($sql);
}
header("../AdminDashboard.php");
exit();