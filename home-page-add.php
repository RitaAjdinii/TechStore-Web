<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php"?>
    <h1>Create home article</h1>
    <form action="includes/home-article.inc.php" method="post" enctype="multipart/form-data">
            <label >Choose image:</label>
             <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="article-image"><br>
        <label>Article title:</label>
        <input type="text" name="article-title"><br>
        <label>Article text content</label>
        <textarea  name="article-paragraph"></textarea>
        <button type="submit" name="submit">Create home article</button>
        <button><a href="../AdminDashboard.php">Cancel</a></button>
    </form> 
    <script src="admin-navbar.js"></script>
</body>
</html>