<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Activity</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="products-body">
    <?php include "navbar.php";?>
    
    <main class="main-page-products">

    <section class="product-cards-container">
        <?php
        require_once "../controllers/product-contr.php";

        $products = new ProductContr();
        $productsArray = $products->getAll();
            foreach ($productsArray as $product) {
               
                    echo "<article class='card'>";
                    echo  "<div class='image-section img-styling' style=\"background-image:url('../Images/{$product['image_file_name']}')\"></div>";
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