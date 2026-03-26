<?php

require_once('../controllers/home-article-contr.php');


$home = new HomeArticleContr();


$homeArticleId ="";
$imageFileName ="";
$imageFilePath="";
$articleTitle="";
$articleParagraph="";

$errorMessage="";
$isSlider = 0;
$successMessage="";



$targetDirectory ="images/";
$homeArticleId = $_GET["id"];
$row=$home->get($homeArticleId);
$imageFileName = $row['home_article_image_name'];
$imageFilePath = $row['home_article_image_path'];
$articleTitle = $row['home_article_title'];
$articleParagraph= $row['home_article_paragraph'];
$isSlider = $row['home_is_slider'];




    
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $imageFileName = basename($_FILES['article-image']["name"]);
    $imageFilePath = $targetDirectory.$imageFileName;
    $articleTitle = $_POST['article-title'];
    $articleParagraph = $_POST['article-paragraph'];
    $home->edit($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$homeArticleId);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>Article Edit</h1>
    <form  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $homeArticleId?>" name="article-id">
        <label >Choose image:</label>
        <input type="file" name="article-image" value="<?php echo $imageFilePath?>" accept="image/jpeg,image/png,image/jpg,image/webp" >
        <br>
        <label for="">Is Slider</label>
        <input type="checkbox" name="isSlider"><br>
        <label >Article name:</label>
        <input type="text" name="article-title" value="<?php echo $articleTitle?>">
        <br>
        <label >Article description:</label>
        <input type="text" name="article-paragraph" value="<?php echo $articleParagraph?>">
        <br>
        <button type="submit">Submit</button>
        <button><a href="AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>