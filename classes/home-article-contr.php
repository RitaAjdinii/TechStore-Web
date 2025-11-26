<?php


class HomeArticleContr extends HomeArticle{

    private $imageFileName;
    private $imageFilePath;
    private $articleTitle;
    private $articleParagraph;


    public function __construct($imageFileName,$imageFilePath,$articleTitle,$articleParagraph){
           $this->imageFileName = $imageFileName;
           $this->imageFilePath = $imageFilePath;
           $this->articleTitle= $articleTitle;
           $this->articleParagraph = $articleParagraph;
    }


     public function createHomeArticle(){
        $this->setHomeArticle($this->imageFileName,$this->imageFilePath,$this->articleTitle,$this->articleParagraph);
    }



}
    
