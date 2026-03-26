<?php

include "../classes/dbh.class.php";

class HomeArticleContr{

    private $dbs;
    //$imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$isSlider)


    public function __construct(){
        $this->dbs = new Dbh();
    }


  //   public function createHomeArticle(){
 //       $this->setHomeArticle($this->imageFileName,$this->imageFilePath,$this->articleTitle,$this->articleParagraph,$this->isSlider);
  //  }


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


    public function edit($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$homeArticleId){
        $sql = $this->dbs->connect()->prepare('UPDATE home_page_article SET home_article_image_name=?,home_article_image_path=?,home_article_title =?,home_article_paragraph=? WHERE home_article_id=?;');
        if($sql->execute(array($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$homeArticleId))){
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
    
