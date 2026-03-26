<?php
require_once('../controllers/home-article-contr.php');
$home = new HomeArticleContr();

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $home->delete($id);
    
}

