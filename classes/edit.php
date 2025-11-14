<?php

include "dbh.class.php";


$dbs = new Dbh();



$id = "";
$name="";
$password="";
$email="";
$location="";
$birthdate="";
$isAdmin="";

$errorMessage ="";
$successMessage = "";

if($_SERVER["REQUEST_METHOD"]=='GET'){
    
    $id = $_GET["id"];
    $sql = $dbs->connect()->prepare("SELECT * FROM user WHERE user_id=$id;");
    if($sql->execute()){      
       $row= $sql->fetch(PDO::FETCH_ASSOC);

        $name = $row['user_name'];
        $password = $row['user_password'];
        $email = $row['user_email'];
        $location = $row['user_location'];
        $birthdate = $row['user_birthdate'];
        $isAdmin = $row['user_isAdmin'];
      
    }
    

}else{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $birthdate = $_POST["birthdate"];
    $isAdmin = $_POST["isAdmin"];

    

        if(empty($id)||empty($name)||empty($email)||empty($location)||empty($birthdate)||empty(($isAdmin==0 || $isAdmin==1)?true:false)){
            $errorMessage = "All fields are required";
        }else{
            if(!empty($password)){
                $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                 $sql=$dbs->connect()->prepare("UPDATE user SET user_name=?,user_password=?,user_email=?,user_location=?,user_birthdate=?,user_isAdmin=? WHERE user_id=?;");
                 if($sql->execute(array($name,$hashedPassword,$email,$location,$birthdate,$isAdmin,$id))){
                    echo "<h1>Hashed Executed properly</h1>";
                 }
            }else{
                 $sql=$dbs->connect()->prepare("UPDATE user SET user_name=?,user_email=?,user_location=?,user_birthdate=?,user_isAdmin=? WHERE user_id=?;");
                 if($sql->execute(array($name,$email,$location,$birthdate,$isAdmin,$id))){
                    echo "<h1>SQL Executed properly</h1>";
                 }
            }
               
        }
    
    
       

       
  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Hello</h1>
    <?php
    echo"
    <h1>$errorMessage</h1>
    "?>
    <form  method="POST">
        <input type="hidden" value="<?php echo $id?>" name="id">
        <label >Name</label>
        <input type="text" name="name" value="<?php echo $name;?>" >
        <label >Password</label>
        <input type="text" name="password" value="" <?php echo $password;?>>
        <label >Email</label>
        <input type="text" name="email" value="<?php echo $email;?>">
        <label >Location</label>
        <input type="text" name="location" value="<?php echo $location;?>">
        <label >Birthdate</label>
        <input type="text" name="birthdate" value="<?php echo $birthdate;?>" >
        <label >isAdmin</label>
        <input type="text" name="isAdmin" value="<?php echo $isAdmin;?>">
        <button type="submit">Submit</button>
        <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
</body>
</html>