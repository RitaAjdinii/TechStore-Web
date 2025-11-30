<?php


class ContactUs extends Dbh{


    public function setContact($name,$email,$message){
        $statement = $this->connect()->prepare('INSERT INTO contact_us(contact_name,contact_email,contact_message) VALUES (?,?,?)');

        if(!$statement->execute(array($name,$email,$message))){
             $statement=null;
            exit();
        }
        $statement=null;

    }

}