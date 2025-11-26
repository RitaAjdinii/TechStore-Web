<?php

class HomeArticle extends Dbh{


    public function setHomeArticle($imageFileName,$imageFilePath,$articleTitle,$articleParagraph){
        $statement = $this->connect()->prepare('INSERT INTO home_page_article(home_article_image_name,home_article_image_path,home_article_title,home_article_paragraph) VALUES(?,?,?,?)');

        
        if(!$statement->execute(array($imageFileName,$imageFilePath,$articleTitle,$articleParagraph))){
            $statement=null;
            header("location:../home-page-add.php/?error=stmtfailed");
            exit();
        }

        $statement =null;
    }

}