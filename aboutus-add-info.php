<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Admin</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>
    <h1>About Us Edits and CRUDs</h1>

    <form action="includes/aboutus-info.inc.php" method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
            <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image"><br>
            <label for="">Is Info</label>
             <input type="checkbox" name="is_info"><br>
            <label>About us  main title:</label>
            <input type="text" name="main-title"><br>
            <label>About us info title:</label>
            <input type="text" name="info-title"><br>
            <label>Description</label>
            <textarea  name="about-info"></textarea>
            <button type="submit" name="submit">Create</button>
            <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
    <script src="admin-navbar.js"></script>
</body>
</html>