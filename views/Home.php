
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/style.css">
<body>
     <?php include "navbar.php";?>
<div id="main-slider">
        <h1 class="main-slider-h1"></h1>
        <p class="slider-paragraph"></p>
        <div class="spanz">
            <a href=""  class="home-slider-span">Learn more<span class="arrow">></span></a>
            <a href="" class="home-slider-span" >Notify me<span class="arrow">></span></a>
        </div>
        <div class="controls">
            <button id ="left"><img src="../Images/arrow_back_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button>
            <button id="right"><img src="../Images/arrow_forward_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg"></button>
        </div>

    </div>
</div>

    <main>
        <section class="home-content">
            <?php

            require_once('../controllers/home-article-contr.php');
            $home = new HomeArticleContr();
            $articlesArray = $home->getDelete(0);
            foreach($articlesArray as $article){
                        echo "<article class='home-article'>";
                        echo  "<div class='home-article-content'>";
                        echo " <h2 class='home-article-h2'>{$article['home_article_title']}</h2>";
                        echo "<p>{$article["home_article_paragraph"]}</p>";
                        echo "</div>";
                        echo "<div class='home-article-image' style=\"background-image:url('../Images/{$article['home_article_image_name']}');\">";
                        echo "</div>";
                        echo "</article>";
            } 

            $slider = $home->getDelete(1);
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
       
        leftBtn.addEventListener("click",()=>{
             index -=1;
            if(index<0){
                index = slider.length-1;
            }

           sliderTitle.textContent=articleTitle= slider[index].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[index].home_article_paragraph;
            sliderBackgroundImg = "../Images/"+slider[index].home_article_image_name;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;
        
           
        });


        rightBtn.addEventListener("click",()=>{
            index +=1;
            if(index>slider.length-1){
                index = 0;
            }
             sliderTitle.textContent=articleTitle= slider[index].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[index].home_article_paragraph;
           sliderBackgroundImg = "../Images/"+slider[index].home_article_image_name;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;
        });


        document.addEventListener("DOMContentLoaded",()=>{
               sliderTitle.textContent=articleTitle= slider[0].home_article_title;
            sliderParagraph.textContent=articleParagraph= slider[0].home_article_paragraph;
            sliderBackgroundImg = "../Images/"+slider[0].home_article_image_name;
            mainSlider.style.backgroundImage = `url(${sliderBackgroundImg})`;

        });


    </script>
</body>
</html>

