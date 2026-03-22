<?php


class AboutUsInfoContr extends AboutUsInfo{
    private $aboutUsMainTitle;
    private $aboutUsTitle;
    private $aboutUsText;
    private $imageFileName;
    private $imageFilePath;
    private $isInfo;

    public function __construct($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo){
        $this->aboutUsMainTitle = $aboutUsMainTitle;
        $this->aboutUsTitle = $aboutUsTitle;
        $this->aboutUsText = $aboutUsText;
        $this->imageFileName=$imageFileName;
        $this->imageFilePath = $imageFilePath;
        $this->isInfo = $isInfo;

    }


    public function createAboutInfo(){
        $this->setInfo($this->aboutUsMainTitle,$this->aboutUsTitle,$this->aboutUsText,$this->imageFileName,$this->imageFilePath,$this->isInfo);
    }


}