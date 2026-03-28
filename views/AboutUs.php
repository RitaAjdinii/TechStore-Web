<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <nav>
         <ul class="nav-list">
            <div class="hamburger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
                <li class="nav-item"><a href="logo" class="logo">TEKK</a></li>
                <li class="nav-item"><a  href="Home.php">Home</a></li>
                <li class="nav-item"><a href="Products.php">Products</a></li>
                <li class="nav-item"><a href="ContactUs.php">Contact Us</a></li>
                <li class="nav-item"><a href="AboutUs.php">About Us</a></li>
                <li class="nav-item"><a href="/Cart"><img src="Images/cart.svg" alt=""></a></li>
                <li class="nav-item"><a href="Login.php">Sign up</a></li>
           </ul>
            <div class="click-menu-addition">
                <ul class="nav-edited">
                   <li class="item-edited"><a  href="Home.php">Home</a></li>
                   <li class="item-edited"><a href="Products.php">Products</a></li>
                   <li class="item-edited"><a href="ContactUs.php">Contact Us</a></li>
                   <li class="item-edited"><a href="AboutUs.php">About Us</a></li>
                   <li class="item-edited"><a href="/Cart">Cart</a></li>
                   <li class="item-edited"><a href="Login.php">Sign up</a></li>
                 </ul>
            </div>
    </nav>
    <?php
    
    
    ?>

     <?php
           require_once "../controllers/aboutus-contr.php";

           $about = new AboutUsContr();
           $infoArticle = $about->getInfoArticle();
           $articles = $about->getArticles();
        

     ?>
    <main>
        


        <div class="about-us-section">
             <div class="about-us-container">
                <div class="about-us-content-section">
                    <div class="about-us-title">
                          <h1 id="big-aboutus-h1">ABOUT <a href="">TEKK</a></h1>
                    </div>
                </div>
                 <div class="about-us-content">
                    <h3><?php echo $infoArticle['about_us_main_title']?></h3>
                    <p class="about-us-content-paragraph">
                       <?php echo $infoArticle['about_us_text']?>
                    </p>
                    <button class="about-us-content-btn">
                        <a href="">Read More</a>
                    </button>
                    </div>
                 <div class="about-image-section">
                    <img src="../{$infoArticle['image_file_path']}" alt="">
                 </div>
              </div> 
                <?php
                foreach($articles as $article){//images are not showing,need to check why
                    echo "<article class='article'>";
                    echo "<div class='article-content'>";
                    echo "<h2 class='article-h2'>{$article['about_us_main_title']}</h2>";
                    echo "<p>{$article['about_us_text']}</p>";
                    echo "</div>";
                    echo "<div class='article-image' style='background-image:url('../{$article['image_file_path']}')'>";
                    echo "</div>";
                    echo "</article>";
                }
            ?>
        </div>
        
    </main>
   <?php include "footer.php";?>
     <script src="../styles/navbar.js">
    </script>
</body>
</html>