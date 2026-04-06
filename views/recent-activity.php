<?php

session_start();
if(isset($_SESSION['userAdmin'])&& $_SESSION['userAdmin']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Activity</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
   
     <?php include "adminHeader.php";?>
    <main class="main-container">
        <h1>Recent Activity</h1>
        <table class="table">
            <thead >
                <tr>
                    <th>Admin:</th>
                    <th>Page:</th>
                    <th>Element ID:</th><!----> 
                    <th>Page element type:</th>
                    <th>Element status:</th>
                    <th>Date and Time:</th>
                </tr>
            </thead>
            <tbody>
            <?php

           
    
                ?>
                
            </tbody>
        </table>
    </main>
    </body>
    </html>


    <?php

}else{
    header('location:Login.php');
}


