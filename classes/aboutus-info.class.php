<?php

class AboutUsInfo extends Dbh{
    
    public function setInfo($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath){
        $statement = $this->connect()->prepare('INSERT INTO about_us_info(about_us_main_title,about_us_title,about_us_text,image_file_name,image_file_path) VALUES(?,?,?,?,?)');

        if(!$statement->execute(array($aboutUsMainTitle,$aboutUsTitle,$aboutUsText,$imageFileName,$imageFilePath))){
             $statement=null;
             header("location:../aboutus-add-info.php/?error=stmtfailed");
             exit();
        }

            $statement =null;
    }

}