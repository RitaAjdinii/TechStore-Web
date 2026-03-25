<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>

    <main class="main-container">
    <h1>About Us Info Containers List</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Main Title:</th>
                <th>Title:</th>
                <th>Info Text:</th>
                <th>Is Info article:</th>
                <th>Image name:</th>
                <th>Image path:</th>
            </tr>
        </thead>
    <tbody>
        <?php
        require_once('../controllers/aboutus-contr.php');

        $about = new AboutUsContr();

        $aboutArray = $about->getAll();

        foreach($aboutArray as $about){
            echo "<tr>";
                    echo "<td class='product'>{$about['about_us_info_id']}</td>";
                    echo "<td class='product'>{$about['about_us_main_title']}</td>";
                    echo "<td class='product'>{$about['about_us_title']}</td>";
                    echo "<td class='product'>{$about['about_us_text']}</td>";
                     echo "<td class='product'>{$about['isInfo']}</td>";
                     echo "<td class='product'>{$about['image_file_name']}</td>";
                     echo "<td class='product'>{$about['image_file_path']}</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href='aboutus-info-edit.php?id=$about[about_us_info_id]'>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                             <a href='aboutus-info-delete.php?id=$about[about_us_info_id]'>Delete</a> 
                          </td>";
                    echo "</tr>";
        }

        ?>
    </tbody>
    </table>
</main>
</body>
</html>
