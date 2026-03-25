<?php

require_once "../controllers/contact-us-contr.php";
$contact= new ContactUsContr();

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $contact->delete($id);
}

