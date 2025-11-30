<?php

if(isset($_POST["submit"])){
    $name =$_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    include "../classes/dbh.class.php";
    include "../classes/contact-us.class.php";
    include "../classes/contact-us-contr.php";


    $contact = new ContactUsContr($name,$email,$message);

    $contact->showContact();
    echo "<h1>Congrats.your data has been submited!!!</h1>";

}