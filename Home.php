
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

        if($sliderSql->execute()){
            $slider = $sliderSql->fetch(PDO::FETCH_ASSOC);
            $mainTitle = $slider['home_article_title'];
            $mainParagraph = $slider['home_article_paragraph'];
        }
    ?>
    <?php include "header.php";?>
    
<div id="main-slider">
        <h1 class="main-slider-h1"><?php echo $mainTitle;?></h1>
        <p class="slider-paragraph"><?php echo $mainParagraph?></p>
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
     <script src="main-home-slider.js"></script>
     <script src="navbar.js"></script>
</body>
</html>

