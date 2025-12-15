<?php

$isInfo;
if(isset($_POST["submit"])){

    $aboutUsMainTitle= $_POST['main-title'];
    $aboutUsTitle= $_POST['info-title'];
    $aboutUsText = $_POST['about-info'];
    $image = $_FILES['image'];
    $imageFileName = basename($_FILES['image']["name"]);
    $imageFilePath = "../images".$imageFileName;
     if($_POST['is_info']==null){
        $isInfo = 0;
     }else{
        $isInfo = 1;
     }



    include "../classes/dbh.class.php";
    include "../classes/aboutus-info.class.php";
    include "../classes/aboutus-info-contr.php";

    $aboutInfo = new AboutUsInfoContr($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo);
    $aboutInfo->createAboutInfo();
     header("location:../aboutus-add.php?error=none");
     echo "<h1>Congrats.your data has been submited!!!</h1>";


}

?>