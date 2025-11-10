<?php

class UserContr extends Dbh{



    public function getUser($id){
        $query= $this->connect()->prepare('SELECT * FROM user WHERE user_id='.$id.'');
        return $query->fetch();
    }
    
    public function getAllUsers(){
           $query= $this->connect()->prepare('SELECT * FROM user');
           return $query->fetchAll();
    }
    
    

}