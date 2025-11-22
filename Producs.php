<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="products-body">
    <?php include "header.php";?>
    <main class="main-page-products">

    <section class="product-cards-container">
        <?php

        $dir = "Images//";
          include "classes/dbh.class.php";
           $dbs = new Dbh();
          $productsSql= $dbs->connect()->prepare('SELECT *FROM product;');
           if($productsSql->execute()){
                $productsArray = $productsSql->fetchAll(PDO::FETCH_ASSOC);
            }
            foreach ($productsArray as $product) {
                $path = $dir.$product['image_file_name'];
                    echo "<article class='card'>";
                    echo  "<div class='image-section img-styling' style=\"background-image:url('Images/{$product['image_file_name']}')\"></div>";
                    echo "<div class='content'>";
                    echo "<h2 class='product-title'>{$product['product_name']}</h2>";
                    echo " <h3 class='product-price'>{$product['product_price']}€</h3>";
                    echo "<p class='product-description'>{$product['product_description']}</p>";
                    echo " <a href='' class=''>Add to Cart</a>";
                    echo "</div>";
                    echo "</article>";
                }
        ?>


    </section>


    </main>
    <?php include "footer.php"?>
    <script src="navbar.js">
    </script>
      
</body>
</html>