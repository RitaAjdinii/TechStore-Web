<?php
   include "../classes/dbh.class.php";


   class AboutUsContr{

    private $dbs;

    public function __construct(){
        $this->dbs = new Dbh();
    }//fix after user page view about

    public function create($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo){//create article when isInfo = 0
    
    $aboutUsSQL = $this->dbs->connect()->prepare('INSERT INTO about_us_info(about_us_main_title,about_us_title,about_us_text,image_file_name,image_file_path,isInfo) VALUES(?,?,?,?,?,?)');
       if($aboutUsSQL->execute(array($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$isInfo))){
        return  $aboutUsSQL->fetchAll();
        }
        return [];
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


    public function edit($aboutUsId,$aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath){
        $aboutUsSQL= $this->dbs->connect()->prepare('UPDATE about_us_info SET about_us_main_title =?,about_us_title=?,about_us_text=?,image_file_name=?,image_file_path=? WHERE about_us_info_id =?;');
        if($aboutUsSQL->execute(array($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath,$aboutUsId))){
            echo "<h1>Edited successfully</h1>";
        }
    }

    public function delete($id){
        $aboutUsSQL = $this->dbs->connect()->prepare('DELETE FROM about_us_info WHERE about_us_info_id=?;');
        if($aboutUsSQL->execute(array($id))){
            echo "<h1>Item deleted successfully</h1>";
        }
    }


    


}