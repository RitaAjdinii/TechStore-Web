<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Producs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul class="nav-list">
           <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
            <li class="nav-item"><a href="/Logo"><img src="Images/logo.svg"  class="logo"></a></li>
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
    <main class="article-container">
       <article>
         <img src="images/ASUS ROG Strix G16 (2024) Gaming Laptop, 16”.webp" alt=""> 
         <h3 class="product-name-tag">ASUS ROG Strix G16 (2024) Gaming Laptop, 16</h3>
         <span class="price-tag">1299$</span>
         <p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo saepe ipsum vitae corporis enim, odio amet officia consectetur quod dolorum <a href="">more...</a></p>
         <button class="add-cart-btn">Add to cart</button>
       </article>






       <!--
  
<article>
         <img src="images/ASUS ROG Strix G16 (2024) Gaming Laptop, 16”.webp" alt=""> 
         <h3 class="product-name-tag">ASUS ROG Strix G16 (2024) Gaming Laptop, 16</h3>
         <span class="price-tag">1299$</span>
         <p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo saepe ipsum vitae corporis enim, odio amet officia consectetur quod dolorum <a href="">more...</a></p>
         <button class="add-cart-btn">Add to cart</button>
       </article>

-->

    </main>




    <script>
      const hamburger = document.querySelector(".hamburger-menu");
      const navList = document.querySelector(".nav-list");
      const clickMenu = document.querySelector(".click-menu-addition");

    hamburger.addEventListener("click",()=>{
      clickMenu.classList.toggle("on");
      hamburger.classList.toggle("rotate");
    });
    </script>
      
</body>
</html>