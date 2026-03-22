<?php




include "classes/dbh.class.php";


$dbs = new Dbh();
$connection = $dbs->connect();
if(isset($_GET["id"])){

    $id=$_GET["id"];
    $sql = "DELETE FROM home_page_article WHERE home_article_id=$id";
   $result =  $connection->prepare($sql);
    if($result->execute()){
        echo "<h1>Item deleted!!!</h1>";
        exit();
    }
}

