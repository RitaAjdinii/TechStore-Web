<?php

include "classes/dbh.class.php";

$dbs = new Dbh();

$contactId ="";
$contactName="";
$contactEmail = "";
$contactMessage = "";

$errorMessage="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $contactId = $_GET["id"];
    $sql = $dbs->connect()->prepare("SELECT * FROM contact_us WHERE contact_id=?;");
     if($sql->execute(array($contactId))){      
       $row= $sql->fetch(PDO::FETCH_ASSOC);
        $contactName = $row['contact_name'];
        $contactEmail = $row['contact_email'];
        $contactMessage = $row['contact_message'];
    }
    
}else{
     $contactId = $_POST['contact-id'];
     $contactName = $_POST['contact-name'];
     $contactEmail = $_POST['contact-email'];
     $contactMessage = $_POST['contact-message'];
    if(empty($contactId)||empty($contactName) || empty($contactEmail) || empty($contactMessage)){
        echo "<h1>All fields are required!!!</h1>";
    }else{
        $sql = $dbs->connect()->prepare("UPDATE contact_us SET contact_name=?,contact_email=?,contact_message=? WHERE contact_id =?;");
        if($sql->execute(array($contactName,$contactEmail,$contactMessage,$contactId))){
            echo "<h1>SQL executed successfully!!!</h1>";
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
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>Contact Us Edit</h1>
    <form  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $contactId?>" name="contact-id">
        <label >Contact name:</label>
        <input type="text" name="contact-name" value="<?php echo $contactName?>">
        <br>
        <label >Contact email:</label>
        <input type="text" name="contact-email" value="<?php echo $contactEmail?>">
        <br>
        <label >Contact Message:</label>
        <textarea type="text" name="contact-message" ><?php echo $contactMessage?></textarea>
        <br>
        <button type="submit">Submit</button>
        <button><a href="AdminDashboard.php">Cancel</a></button>
    </form> 

    <script src="admin-navbar.js"></script>
</body>
</html>