<?php


include "../classes/dbh.class.php";
class ContactUsContr{

    private $dbs;

    public function __construct(){
        $this->dbs = new Dbh();
    }

    public function getAll(){
         $contactSQL = $this->dbs->connect()->prepare("SELECT * FROM contact_us;");
            if($contactSQL->execute()){
                return $contactSQL->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
    }


    public function create($name,$email,$message){
        $contactSQL = $this->dbs->connect()->prepare('INSERT INTO contact_us(contact_name,contact_email,contact_message) VALUES (?,?,?)');

        if(!$contactSQL->execute(array($name,$email,$message))){
             $contactSQL=null;
            exit();
        }
        $statement=null;
    }

    public function delete($id){
        $contactSQL = $this->dbs->connect()->prepare('DELETE FROM contact_us WHERE contact_id=?;');
        if($contactSQL->execute(array($id))){
            echo "<h1>Item deleted!!!</h1>";
            exit();
        }
        

    }


}