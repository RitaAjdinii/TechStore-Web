<?php


class HomeArticleContr extends HomeArticle{

    private $imageFileName;
    private $imageFilePath;
    private $articleTitle;
    private $articleParagraph;
    private $isSlider;


    public function __construct($imageFileName,$imageFilePath,$articleTitle,$articleParagraph,$isSlider){
           $this->imageFileName = $imageFileName;
           $this->imageFilePath = $imageFilePath;
           $this->articleTitle= $articleTitle;
           $this->articleParagraph = $articleParagraph;
           $this->isSlider = $isSlider;
    }


     public function createHomeArticle(){
        $this->setHomeArticle($this->imageFileName,$this->imageFilePath,$this->articleTitle,$this->articleParagraph,$this->isSlider);
    }



}
    
