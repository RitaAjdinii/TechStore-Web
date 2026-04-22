<?php

session_start();
if(isset($_SESSION['userAdmin'])&& $_SESSION['userAdmin']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchases By User</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
   
     <?php include "adminHeader.php";?>
    <main class="main-container">
        <h1>Purchases of Username:</h1>
     
    </main>
    </body>
    </html>


    <?php

}else{
    header('location:Login.php');
}


