<?php

class SignupContr extends Signup{

    private $username;
    private $location;
    private $birthdate;
    private $email;
    private $password;
    private $isAdmin;
   



    public function __construct($username,$location,$birthdate,$email,$password,$isAdmin){
        $this->username=$username;
        $this->location = $location;
        $this->birthdate = $birthdate;
        $this->email=$email;
        $this->password=$password;        
        $this->isAdmin = $isAdmin;      
    }
    


    public function signupUser(){
        if($this->emptyInput()==false){
             header("location: ../index.php?error=emptyInput");
            exit();

        }

        if($this->invalidUsername()==false){

            header("location: ../index.php?error=invalidusername");
            exit();
        }
        if($this->invalidEmail()==false){

            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if($this->invalidPassword()==false){

            header("location: ../index.php?error=invalidPassword");
            exit();
        }



        $this->setUser($this->username,$this->location,$this->birthdate,$this->email,$this->password,$this->isAdmin);
    }


    public function emptyInput(){
        $result;

        if(empty($this->username)|empty($this->location)||empty($this->birthdate)||empty($this->email)||empty($this->password)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    

     public function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9._ -]+$/",$this->username)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }




    public function invalidEmail(){
        $result;

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }


    public function invalidPassword(){
        $result;
       $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/';
        if(!preg_match($regex,$this->password)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    


    //username taken handler check?? to see if your username was taken by another user.\

}