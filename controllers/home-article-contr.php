<?php

include "../classes/dbh.class.php";

class HomeArticleContr{

    private $dbs;
   
    public function __construct(){
        $this->dbs = new Dbh();
    }



    public function getAll(){
        $sql = $this->dbs->connect()->prepare('SELECT* FROM home_page_article;');
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return[];
    }

    public function get($id){
        $sql = $this->dbs->connect()->prepare('SELECT * FROM home_page_article WHERE home_article_id=?;');
        if($sql->execute(array($id))){
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

    }


    public function getArticles(){
        $sql = $this->dbs->connect()->prepare('SELECT * FROM home_page_article WHERE home_is_slider=0;');
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    public function create($articleTitle,$articleParagraph,$isSlider,$createdBy){
         $sql = $this->dbs->connect()->prepare('INSERT INTO home_page_article(home_article_title,home_article_paragraph,home_is_slider,home_article_image_name,home_article_image_path,created_by) VALUES(?,?,?,?,?,?)');
         $targetDirectory = "../Images/";
         $imageFileName = basename($_FILES["photo"]["name"]);
         $imageFilePath = $targetDirectory.$imageFileName;

         if($sql->execute(array($articleTitle,$articleParagraph,$isSlider,$imageFileName,$imageFilePath,$createdBy))){
                move_uploaded_file($_FILES['image']['tmp_name'],$imageFilePath);
                header("location:../views/aboutus-add-info.php/?error=none");
         }
                header("location:../views/aboutus-add-info.php/?error=stmtfailed");
    }

    public function getSliders(){        
        $sql = $this->dbs->connect()->prepare('SELECT * FROM home_page_article WHERE home_is_slider=1;');
         if($sql->execute()){
            return $sql->fetchAll();
        }
    }

    public function edit($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$editedBy,$homeArticleId){
        $sql = $this->dbs->connect()->prepare('UPDATE home_page_article SET home_article_image_name=?,home_article_image_path=?,home_article_title =?,home_article_paragraph=?,edited_by=? WHERE home_article_id=?;');
        if($sql->execute(array($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$editedBy,$homeArticleId))){
             echo "<h1>Edited successfully</h1>";
        }
    }

    public function delete($id){
        $sql = $this->dbs->connect()->prepare('DELETE FROM home_page_article WHERE home_article_id=?; ');
        if($sql->execute(array($id))){
             echo "<h1>Deleted successfully</h1>";
        }
    }


}
    
