<?php


class AboutUsInfoContr extends AboutUsInfo{
    private $aboutUsMainTitle;
    private $aboutUsTitle;
    private $aboutUsText;
    private $imageFileName;
    private $imageFilePath;


    public function __construct($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath){
        $this->aboutUsMainTitle = $aboutUsMainTitle;
        $this->aboutUsTitle = $aboutUsTitle;
        $this->aboutUsText = $aboutUsText;
        $this->imageFileName=$imageFileName;
        $this->imageFilePath = $imageFilePath;

    }


    public function createAboutInfo(){
        $this->setInfo($this->aboutUsMainTitle,$this->aboutUsTitle,$this->aboutUsText,$this->imageFileName,$this->imageFilePath);
    }


}