<?php

require_once('../controllers/aboutus-contr.php');
    

$about = new AboutUsContr();
$aboutInfoId ="";
$ImgFileName="";
$ImgFilePath = "";
$aboutMainTitle="";
$aboutTitle="";
$aboutInfoText="";



$targetDirectory ="Images/";
$aboutId = $_GET["id"];
$aboutRow = $about->get($aboutId);

$aboutMainTitle=$aboutRow['about_us_main_title'];
$aboutTitle=$aboutRow['about_us_title'];
$aboutInfoText=$aboutRow['about_us_text'];
$ImgFileName=$aboutRow['image_file_name'];
$ImgFilePath = $aboutRow['image_file_path'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ImgFileName=basename($_FILES['image']['name']);
    $ImgFilePath = $targetDirectory.$ImgFileName;
    $aboutMainTitle=$_POST['main-title'];
    $aboutTitle=$_POST['info-title'];
    $aboutInfoText=$_POST['about-info'];
    $about->edit($aboutId,$aboutMainTitle,$aboutTitle,$aboutInfoText,$ImgFileName,$ImgFilePath);
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

    <form  method="post" enctype="multipart/form-data" class="crud-form">
            <label >Choose image:</label>
            <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" value="<?php echo $imageFileName;?>"><br>
            <label>About us  main title:</label>
            <input type="text" name="main-title" value="<?php echo $aboutMainTitle;?>"><br>
            <label>About us info title:</label>
            <input type="text" name="info-title" value="<?php echo $aboutTitle;?>"><br>
            <label>Description</label>
            <textarea  name="about-info" value=""><?php echo $aboutInfoText;?></textarea>
            <button type="submit" name="submit">Edit</button>
            <button><a href="../views/AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>


