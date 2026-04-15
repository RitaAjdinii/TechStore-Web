<?php
   include "../classes/dbh.class.php";


   class AboutUsContr{

    private $dbs;

    public function __construct(){
        $this->dbs = new Dbh();
    }//fix after user page view about

    public function create($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$isInfo,$createdBy){//create article when isInfo = 0
        $aboutUsSQL = $this->dbs->connect()->prepare('INSERT INTO about_us_info(about_us_main_title,about_us_title,about_us_text,image_file_name,image_file_path,isInfo,created_by) VALUES(?,?,?,?,?,?,?)');
        $targetDirectory = "../Images/";
        $image = $_FILES['image'];
        $imageFileName = basename($_FILES['image']["name"]);
        $imageFilePath = $targetDirectory.$imageFileName;
       if($aboutUsSQL->execute(array($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo,$createdBy))){
        move_uploaded_file($_FILES["image"]["tmp_name"],$imageFilePath);
        header("location:../views/aboutus-add-info.php/?error=none");
        }
        header("location:../views/aboutus-add-info.php/?error=stmtfailed");
        

    }
     
    public function get($id){
        $aboutUsSQL= $this->dbs->connect()->prepare('SELECT * FROM about_us_info WHERE about_us_info_id=?;');
        if($aboutUsSQL->execute(array($id))){
            return $aboutUsSQL->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function getAll(){
        $aboutUsSQL = $this->dbs->connect()->prepare('SELECT * FROM about_us_info;');
        if($aboutUsSQL->execute()){
            return $aboutUsSQL->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function getInfoArticle(){
        $aboutUsSQL=$this->dbs->connect()->prepare('SELECT * FROM about_us_info WHERE isInfo=1;');
         if($aboutUsSQL->execute()){
            return $aboutUsSQL->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function getArticles(){
        $aboutUsSQL = $this->dbs->connect()->prepare('SELECT * FROM about_us_info WHERE isInfo=0;');
         if($aboutUsSQL->execute()){
            return $aboutUsSQL->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }


    public function edit($aboutUsId,$aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$editedBy){
        $aboutUsSQL= $this->dbs->connect()->prepare('UPDATE about_us_info SET about_us_main_ti
        }tle =?,about_us_title=?,about_us_text=?,image_file_name=?,image_file_path=?,edited_by=? WHERE about_us_info_id =?;');
        if($aboutUsSQL->execute(array($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$editedBy,$aboutUsId))){
            echo "<h1>Edited successfully</h1>";
        }
    }


    public function delete($deletedBy,$id){
        $sql = $this->dbs->connect()->prepare('UPDATE about_us_info SET deleted_at = NOW(),deleted_by=? WHERE about_us_info_id=?;');
        if($sql->execute(array($deletedBy,$id))){
            echo "<h1>The item has been removed from the page</h1>";
    }
    }

    public function forceDelete($id){
        $sql = $this->dbs->connect()->prepare('DELETE FROM about_us_info WHERE about_us_info_id=?;');
        if($sql->execute(array($id))){
             echo "<h1>Deleted successfully</h1>";
        }
    }

    public function getDelete($isInfo){
        $sql = $this->dbs->connect()->prepare('SELECT * FROM about_us_info WHERE deleted_at IS NULL AND isInfo=?;');
        if($sql->execute(array($isInfo))){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    } 

    public function restore($id){
        $sql = $this->dbs->connect()->prepare("UPDATE about_us_info SET deleted_at=NULL,deleted_by = NULL WHERE about_us_info_id=?;");
        if($sql->execute(array($id))){
            echo "Item has been restored in the page";
        }
    }


    


}