
<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
<body>
    <?php
    include "classes/dbh.class.php";

        $dbs = new Dbh();

        $sliderSql = $dbs->connect()->prepare('SELECT * FROM home_page_article WHERE home_is_slider=1');
        $slider= [];
        if($sliderSql->execute()){
            $slider = $sliderSql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
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
    
<div id="main-slider">
        <h1 class="main-slider-h1"></h1>
        <p class="slider-paragraph"></p>
        <div class="spanz">
            <a href=""  class="home-slider-span">Learn more<span class="arrow">></span></a>
            <a href="" class="home-slider-span" >Notify me<span class="arrow">></span></a>
        </div>
        <div class="controls">
            <button id ="left"><img src="Images/arrow_back_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button>
            <button id="right"><img src="Images/arrow_forward_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg"></button>
        </div>

    </div>
</div>

    <main>
        <section class="home-content">
        <!--
        <article class="home-article">
                 <div class="home-article-content">
                    <h2 class="home-article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="home-article-image" style="background-image:url('Images/Lenovo IdeaCentre AIO 3i, All-in-One Desktop.webp');">
                </div>
            </article>
        -->
            <?php
        
        

        

         $articleSql = $dbs->connect()->prepare('SELECT * FROM home_page_article WHERE home_is_slider=0;');
         if($articleSql->execute()){
            $articlesArray = $articleSql->fetchAll(PDO::FETCH_ASSOC);
         }

         foreach($articlesArray as $article){
        
                    echo "<article class='home-article'>";
                    echo  "<div class='home-article-content'>";
                    echo " <h2 class='home-article-h2'>{$article['home_article_title']}</h2>";
                    echo "<p>{$article["home_article_paragraph"]}</p>";
                    echo "</div>";
                    echo "<div class='home-article-image' style=\"background-image:url('Images/{$article['home_article_image_name']}');\">";
                    echo "</div>";
                    echo "</article>";
         }
        ?>


        </section>
    </main>
    <?php include "footer.php";?>
    <script>
        const leftBtn = document.querySelector("#left");
        const rightBtn = document.querySelector("#right");
        const mainSlider = document.querySelector("#main-slider");
        let slider =<?php echo json_encode($slider); ?>;
        let index =0;
        let sliderTitle = document.querySelector('.main-slider-h1');
        let sliderParagraph = document.querySelector('.slider-paragraph');
        let sliderBackgroundImg;
       
        console.log(slider);
        leftBtn.addEventListener("click",()=>{
             index -=1;
            if(index<0){
                index = slider.length-1;
            }

           sliderTitle.textContent=articleTitle= slider[index].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[index].home_article_paragraph;
            sliderBackgroundImg = slider[index].home_article_image_path;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;
         
        
           
        });


        rightBtn.addEventListener("click",()=>{
            
            index +=1;
            if(index>slider.length-1){
                index = 0;
            }
             sliderTitle.textContent=articleTitle= slider[index].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[index].home_article_paragraph;
            sliderBackgroundImg = slider[index].home_article_image_path;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;
        });


        document.addEventListener("DOMContentLoaded",()=>{
               sliderTitle.textContent=articleTitle= slider[0].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[0].home_article_paragraph;
            sliderBackgroundImg = slider[0].home_article_image_path;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;

        });


    </script>
     <script src="navbar.js"></script>
</body>
</html>

