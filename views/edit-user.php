<?php

require_once("../controllers/user-contr.php");
     $user = new UserContr();

$id = "";
$name="";
$password="";
$email="";
$location="";
$birthdate="";
$isAdmin="";


    
$id = $_GET["id"];
$row= $user->get($id);
$name = $row['user_name'];
$password = $row['user_password'];
$email = $row['user_email'];
$location = $row['user_location'];
$birthdate = $row['user_birthdate'];
$isAdmin = $row['user_isAdmin'];
    

if($_SERVER["REQUEST_METHOD"]=='POST'){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $birthdate = $_POST["birthdate"];
    $isAdmin = $_POST["isAdmin"];
    if(empty($id)||empty($name)||empty($email)||empty($location)||empty($birthdate)||empty(($isAdmin==0 || $isAdmin==1)?true:false)){
        echo "<h1>All fields are required!!</h1>";
    }else{
        $user->edit($name,$password,$email,$location,$birthdate,$isAdmin,$id);
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