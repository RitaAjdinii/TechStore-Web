<?php

if(isset($_POST["submit"])){


    $home_article_title = $_POST['article-title'];
     $home_article_paragraph = $_POST['article-paragraph'];
     $image =$_FILES['article-image'];

     $targetDirectory = "../images/";
     $imageFileName = basename($_FILES["article-image"]["name"]);
     $imageFilePath = $targetDirectory.$imageFileName;
     
    include "../classes/dbh.class.php";
    include "../classes/home-article.class.php";
    include "../classes/home-article-contr.php";

    $homeArticle= new HomeArticleContr($imageFileName,$imageFilePath,$home_article_title,$home_article_paragraph);
    $homeArticle->createHomeArticle();
       header("location:../product-add.php?error=none");
       echo "<h1>Congrats.your data has been submited!!!</h1>";

}