<?php

include "classes/dbh.class.php";

$dbs= new Dbh();

$aboutInfoId ="";
$ImgFileName="";
$ImgFilePath = "";
$aboutMainTitle="";
$aboutTitle="";
$aboutInfoText="";

$errorMessage="";
$successMessage="";

$targetDirectory ="images/";
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $aboutInfoId = $_GET["id"];
    $sql = $dbs->connect()->prepare("SELECT * FROM about_us_info WHERE about_us_info_id=?");
    if($sql->execute(array($aboutInfoId))){
        $row = $sql->fetch(PDO::FETCH_ASSOC);
          $aboutMainTitle=$row['about_us_main_title'];
          $aboutTitle=$row['about_us_title'];
          $aboutInfoText=$row['about_us_text'];
          $ImgFileName=$row['image_file_name'];
          $ImgFilePath = $row['image_file_path'];
    }
}else{
    $aboutInfoId =$_POST['about-id'];
    $ImgFileName=basename($_FILES['image']['name']);
    $ImgFilePath = $targetDirectory.$ImgFileName;
    $aboutMainTitle=$_POST['main-title'];
    $aboutTitle=$_POST['info-title'];
    $aboutInfoText=$_POST['about-info'];


    if(empty($aboutInfoId)||empty($ImgFilePath) || empty($aboutMainTitle) || empty($aboutTitle) || empty($aboutInfoText)){
        echo "<h1>All fields are required!!!</h1>";
    }else{
        $sql = $dbs->connect()->prepare("UPDATE about_us_info SET about_us_main_title=?,about_us_title=?,about_us_text=?,image_file_name=?,image_file_path=? WHERE about_us_info_id=?");

        if($sql->execute(array($aboutMainTitle,$aboutTitle,$aboutInfoText,$ImgFileName,$ImgFilePath,$aboutInfoId))){
            echo "<h1>SQL executed successfully!!!</h1>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Admin</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>About Us Edits and CRUDs</h1>

    <form  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $aboutInfoId;?>" name="about-id">
            <label >Choose image:</label>
            <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" value="<?php echo $imageFileName;?>"><br>
            <label>About us  main title:</label>
            <input type="text" name="main-title" value="<?php echo $aboutMainTitle;?>"><br>
            <label>About us info title:</label>
            <input type="text" name="info-title" value="<?php echo $aboutTitle;?>"><br>
            <label>Description</label>
            <textarea  name="about-info" value=""><?php echo $aboutInfoText;?></textarea>
            <button type="submit" name="submit">Create</button>
            <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
    <script src="admin-navbar.js"></script>
</body>
</html>


