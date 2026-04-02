<?php


if(isset($_POST["submit"])){
    require_once('../controllers/home-article-contr.php');
    $home_article_title = $_POST['article-title'];
    $home_article_paragraph = $_POST['article-paragraph'];
     if($_POST['isSlider']==null){
      $isSlider = 0;
     }else{
        $isSlider = 1;
     }
     $home = new HomeArticleContr();
     $home->create($home_article_title,$home_article_paragraph,$isSlider);
     echo "<h1>Congrats.your data has been submited!!!</h1>";

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php"?>
    <h1>Create home article</h1>
    <form  method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
             <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="article-image"><br>
             <label for="">Is Slider</label>
             <input type="checkbox" name="isSlider"><br>
            <label>Article title:</label>
            <input type="text" name="article-title"><br>
            <label>Article text content</label>
            <textarea  name="article-paragraph"></textarea>
            <button type="submit" name="submit">Create home article</button>
              <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>