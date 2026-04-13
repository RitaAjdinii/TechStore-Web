<?php
session_start();
require_once('../controllers/home-article-contr.php');

$home = new HomeArticleContr();
if(isset($_GET["id"])){
    $deletedBy = $_SESSION['username'];
    $id=$_GET["id"];
    $home->delete($deletedBy,$id);
    
}

