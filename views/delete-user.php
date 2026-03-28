<?php

require_once("../controllers/user-contr.php");

if(isset($_GET["id"])){

    $id=$_GET["id"];
    $user = new UserContr();
    $user->delete($id);
    
}