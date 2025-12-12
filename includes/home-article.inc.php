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


     $targetDirectory = "../images/";
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