<?php


if(isset($_POST["submit"])){


    $home_article_title = $_POST['article-title'];
     $home_article_paragraph = $_POST['article-paragraph'];
     $image =$_FILES['article-image'];
     if($_POST['is_slider']==null){
        $isSlider = 0;
     }else{
        $isSlider = 1;
     }


     $targetDirectory = "images/";
     $imageFileName = basename($_FILES["article-image"]["name"]);
     $imageFilePath = $targetDirectory.$imageFileName;
     
    include "../classes/dbh.class.php";
    include "../classes/home-article.class.php";
    include "../classes/home-article-contr.php";

    $homeArticle= new HomeArticleContr($imageFileName,$imageFilePath,$home_article_title,$home_article_paragraph,$isSlider);
    $homeArticle->createHomeArticle();
       header("location:../home-page-add.php?error=none");
       echo "<h1>Congrats.your data has been submited!!!</h1>";

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php"?>
    <h1>Create home article</h1>
    <form  method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
             <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="article-image"><br>
             <label for="">Is Slider</label>
             <input type="checkbox" name="is_slider"><br>
            <label>Article title:</label>
            <input type="text" name="article-title"><br>
            <label>Article text content</label>
            <textarea  name="article-paragraph"></textarea>
            <button type="submit" name="submit">Create home article</button>
              <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>