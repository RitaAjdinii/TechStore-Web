<?php

if(isset($_POST["submit"])){

    $aboutUsMainTitle= $_POST['main-title'];
    $aboutUsTitle= $_POST['info-title'];
    $aboutUsText = $_POST['about-info'];
    $image = $_FILES['image'];
    $imageFileName = basename($_FILES['image']["name"]);
    $imageFilePath = "../images".$imageFileName;

    include "../classes/dbh.class.php";
    include "../classes/aboutus-info.class.php";
    include "../classes/aboutus-info-contr.php";

    $aboutInfo = new AboutUsInfoContr($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath);
    $aboutInfo->createAboutInfo();
     header("location:../product-add.php?error=none");
     echo "<h1>Congrats.your data has been submited!!!</h1>";


}

?>