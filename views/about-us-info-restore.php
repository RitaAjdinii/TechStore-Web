<?php

require_once "../controllers/aboutus-contr.php";

$about= new AboutUsContr();

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $about->restore($id);
}

