<?php

class HomeArticle extends Dbh{


    public function setHomeArticle($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$isSlider){
        $statement = $this->connect()->prepare('INSERT INTO home_page_article(home_article_title,home_article_paragraph,home_is_slider,home_article_image_name,home_article_image_path) VALUES(?,?,?,?,?)');

        
        if(!$statement->execute(array($articleTitle,$articleParagraph,$isSlider,$imageFileName,$imageFilePath))){
            $statement=null;
            header("location:../home-page-add.php/?error=stmtfailed");
            exit();
        }

        $statement =null;
    }

}