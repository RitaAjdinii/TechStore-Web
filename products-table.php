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
    <h1>Products List</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Description:</th>
                <th>Price:</th>
            </tr>
        </thead>
    <tbody>
        <?php
         include "classes/dbh.class.php";
        $dbs = new Dbh();
        $productSql = $dbs->connect()->prepare("SELECT * FROM product;");
        if($productSql->execute()){
            $productsArray=$productSql->fetchAll(PDO::FETCH_ASSOC);
        }



        foreach($productsArray as $product){
            echo "<tr>";
                    echo "<td class='product'>{$product['product_id']}</td>";
                    echo "<td class='product'>{$product['product_name']}</td>";
                    echo "<td class='product'>{$product['product_description']}</td>";
                    echo "<td class='product'>{$product['product_price']}</td>";
                     echo "<td class='product'>{$product['image_file_name']}</td>";
                     echo "<td class='product'>{$product['image_file_path']}</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href='product-edit.php?id=$product[product_id]'>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                             <a href='product-delete.php?id=$product[product_id]' >Delete</a> 
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
