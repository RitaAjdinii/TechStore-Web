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
    <h1>Products List</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Description:</th>
                <th>Price:</th>
                <th>Image File Name:</th>
                <th>Created At:</th>
                <th>Created By:</th>
                <th>Edited At:</th>
                <th>Edited By:</th>
            </tr>
        </thead>
    <tbody>
        <?php
        require_once "../controllers/product-contr.php";

        $productController = new ProductContr();

        $productsArray = $productController->getAll();

        foreach($productsArray as $product){
            echo "<tr>";
                    echo "<td class='product'>{$product['product_id']}</td>";
                    echo "<td class='product'>{$product['product_name']}</td>";
                    echo "<td class='product'>{$product['product_description']}</td>";
                    echo "<td class='product'>{$product['product_price']}</td>";
                     echo "<td class='product'>{$product['image_file_name']}</td>";
                     echo "<td class='product'>{$product['created_at']}</td>";
                     echo "<td class='product'>{$product['created_by']}</td>";
                     echo "<td class='product'>{$product['edited_at']}</td>";
                      echo "<td class='product'>{$product['edited_by']}</td>";
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
</body>
</html>
