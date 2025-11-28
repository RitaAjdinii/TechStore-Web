<?php

class ProductContr extends Product{
    
    private $imageFileName;
    private $imageFilePath;
    private $name;
    private $description;
    private $price;

    public function  __construct($imageFileName,$imageFilePath,$name,$description,$price){
        $this->imageFileName = $imageFileName;
        $this->imageFilePath = $imageFilePath;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public function createProduct(){
        $this->setProduct($this->imageFileName,$this->imageFilePath,$this->name,$this->description,$this->price);
    }


}