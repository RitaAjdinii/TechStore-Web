<?php

class Dbh{

    

    public function connect(){
        try{

            $username  ="root";
            $password = "";

            $dbh= new PDO("mysql:host=localhost;dbname=web-tech-store",$username,$password);
            return $dbh;
        }catch(PDOException $e){
             print "Connection failed: " . $e->getMessage()."</br>";
              die();
        }

    }


   
}