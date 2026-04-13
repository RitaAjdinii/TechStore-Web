<?php


session_start();
require_once "../controllers/aboutus-contr.php";

$about= new AboutUsContr();

if(isset($_GET["id"])){
    $deletedBy = $_SESSION['username'];
    $id=$_GET["id"];
    $about->delete($deletedBy,$id);
}

