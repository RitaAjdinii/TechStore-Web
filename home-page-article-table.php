<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>

<main class="main-container">
    <h1>Home Page article list</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Article Title:</th>
                <th>Article Paragraph:</th>
                <th>Is Slider:</th>
                <th>Image name:</th>
                <th>Image path:</th>
            </tr>
        </thead>
    <tbody>
        <?php
         require_once "classes/dbh.class.php";
        $dbs = new Dbh();
        $articleSql = $dbs->connect()->prepare("SELECT * FROM home_page_article;");
        if($articleSql->execute()){
            $articleArray=$articleSql->fetchAll(PDO::FETCH_ASSOC);
        }



        foreach($articleArray as $article){
            echo "<tr>";
                    echo "<td class='product'>{$article['home_article_id']}</td>";
                    echo "<td class='product'>{$article['home_article_title']}</td>";
                    echo "<td class='product'>{$article['home_article_paragraph']}</td>";
                    echo "<td class='product'>{$article['home_is_slider']}</td>";
                     echo "<td class='product'>{$article['home_article_image_name']}</td>";
                     echo "<td class='product'>{$article['home_article_image_path']}</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href='home-article-edit.php?id=$article[home_article_id]'>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                             <a href='home-article-delete.php?id=$article[home_article_id]'>Delete</a> 
                          </td>";
                    echo "</tr>";
        }
        ?>
    </tbody>
    </table>
</main>




     <script src="admin-navbar.js">
     </script>
</body>
</html>
