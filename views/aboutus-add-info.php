<?php
if(isset($_POST['submit'])){
    require_once('../controllers/aboutus-contr.php');
    
    
    $aboutUsMainTitle= $_POST['main-title'];
    $aboutUsTitle= $_POST['info-title'];
    $aboutUsText = $_POST['about-info'];
    $image = $_FILES['image'];
    $imageFileName = basename($_FILES['image']["name"]);
    $isInfo;
    $imageFilePath = "../images".$imageFileName;
     if($_POST['isInfo']==null){
        $isInfo = 0;
     }else{
        $isInfo = 1;
     }

    $about = new AboutUsContr();
    $createAbout = $about->create($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo);
     header("location:../product-add.php?error=none");
            echo "<h1>Congrats.your data has been submited!!!</h1>";

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Admin</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>About Us Edits and CRUDs</h1>

    <form  method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
            <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"><br>
            <label for="">Is Info</label>
             <input type="checkbox" name="isInfo"><br>
            <label>About us  main title:</label>
            <input type="text" name="main-title"><br>
            <label>About us info title:</label>
            <input type="text" name="info-title"><br>
            <label>Description</label>
            <textarea  name="about-info"></textarea>
            <button type="submit" name="submit">Create</button>
            <button><a href="../views/AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>