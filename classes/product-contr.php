<?php

class ProductContr extends Product{
    
    private $image;
    private $name;
    private $description;
    private $price;

    public function  __construct($image,$name,$description,$price){
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public function createProduct(){
        $this->setProduct($this->image,$this->name,$this->description,$this->price);
    }


}