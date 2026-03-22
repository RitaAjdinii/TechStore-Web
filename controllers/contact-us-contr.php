<?php

class ContactUsContr extends ContactUs{

    private $name;
    private $email;
    private $message;

    public function __construct($name,$email,$message){
        $this->name =$name;
        $this->email = $email;
        $this->message = $message;
    }


    public function showContact(){
        $this->setContact($this->name,$this->email,$this->message);
    }

}