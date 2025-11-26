<?php

include "classes/dbh.class.php";

$dbs = new Dbh();

$homeArticleId ="";
$imageFileName ="";
$imageFilePath="";
$articleTitle="";
$articleParagraph="";

$errorMessage="";
$successMessage="";

$targetDirectory ="images/";

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $homeArticleId = $_GET["id"];
    $sql = $dbs->connect()->prepare("SELECT * FROM home_page_article WHERE home_article_id=?;");
     if($sql->execute(array($homeArticleId))){      
       $row= $sql->fetch(PDO::FETCH_ASSOC);
        $imageFileName = $row['home_article_image_name'];
         $imageFilePath = $row['home_article_image_path'];
        $articleTitle = $row['home_article_title'];
        $articleParagraph= $row['home_article_paragraph'];
    }
    
}else{
    $homeArticleId = $_POST["article-id"];
    $imageFileName = basename($_FILES['article-image']["name"]);
    $imageFilePath = $targetDirectory.$imageFileName;
    $articleTitle = $_POST['article-title'];
    $articleParagraph = $_POST['article-paragraph'];

    if(empty($homeArticleId)||empty($imageFilePath) || empty($articleTitle) || empty($articleParagraph)){
        echo "<h1>All fields are required!!!</h1>";
    }else{
        $sql = $dbs->connect()->prepare("UPDATE home_page_article SET home_article_image_name =?,home_article_image_path=?,home_article_title=?,home_article_paragraph=? WHERE home_article_id =?;");
        if($sql->execute(array($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$homeArticleId))){
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
    <title>Edit User</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>Product Edit</h1>
    <form  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $homeArticleId?>" name="article-id">
        <label >Product image:</label>
        <input type="file" name="article-image" value="<?php echo $imageFilePath?>" accept="image/jpeg,image/png,image/jpg,image/webp" >
        <br>
        <label >Product name:</label>
        <input type="text" name="article-title" value="<?php echo $articleTitle?>">
        <br>
        <label >Product description:</label>
        <input type="text" name="article-paragraph" value="<?php echo $articleParagraph?>">
        <br>
        <button type="submit">Submit</button>
        <button><a href="AdminDashboard.php">Cancel</a></button>
    </form> 

    <script src="admin-navbar.js"></script>
</body>
</html>