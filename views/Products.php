<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="products-body">
    <nav>
                        <ul class="nav-list">
                        <div class="hamburger-menu">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                            <li class="nav-item"><a href="logo" class="logo">TEKK</a></li>
                            <li class="nav-item"><a  href="Home.php">Home</a></li>
                            <li class="nav-item"><a href="Producs.php">Products</a></li>
                            <li class="nav-item"><a href="ContactUs.php">Contact Us</a></li>
                            <li class="nav-item"><a href="AboutUs.php">About Us</a></li>
                            <li class="nav-item"><a href="/Cart"><img src="Images/cart.svg" alt=""></a></li>
                            <li class="nav-item"><a href="Login.php">Sign up</a></li>
                        </ul>
                        <div class="click-menu-addition">
                        <ul class="nav-edited">
                            <li class="item-edited"><a  href="Home.php">Home</a></li>
                            <li class="item-edited"><a href="Producs.php">Products</a></li>
                            <li class="item-edited"><a href="ContactUs.php">Contact Us</a></li>
                            <li class="item-edited"><a href="AboutUs.php">About Us</a></li>
                            <li class="item-edited"><a href="/Cart">Cart</a></li>
                            <li class="item-edited"><a href="Login.php">Sign up</a></li>
                        </ul>
                        </div>
                    </nav>
    
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