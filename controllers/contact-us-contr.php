<?php


include "../classes/dbh.class.php";
class ContactUsContr{

    private $dbs;

    public function __construct(){
        $this->dbs = new Dbh();
    }

    public function getAll(){
         $sql = $this->dbs->connect()->prepare("SELECT * FROM contact_us;");
            if($sql->execute()){
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            return [];
    }


    public function create($name,$email,$message){
        $sql = $this->dbs->connect()->prepare('INSERT INTO contact_us(contact_name,contact_email,contact_message) VALUES (?,?,?)');

        if(!$sql->execute(array($name,$email,$message))){
             $sql=null;
            exit();
        }
        $statement=null;
    }

    public function delete($id){
        $sql = $this->dbs->connect()->prepare('DELETE FROM contact_us WHERE contact_id=?;');
        if($sql->execute(array($id))){
            echo "<h1>Item deleted!!!</h1>";
            exit();
        }
    }

    


}