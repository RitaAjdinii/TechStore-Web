<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php";?>
    <?php
    include "classes/dbh.class.php";
    ?>

 <?php
            $dbs = new Dbh();
             $infoSql = $dbs->connect()->prepare('SELECT * FROM about_us_info WHERE isInfo=1;');
            if($infoSql->execute()){
                $infoArticle = $infoSql->fetch(PDO::FETCH_ASSOC);
            }
            $infoTitle = $infoArticle['about_us_main_title'];
            $infoText = $infoArticle['about_us_text'];
            $articleArray;
            $articleSql = $dbs->connect()->prepare('SELECT * FROM about_us_info WHERE isInfo=0;');

            if($articleSql->execute()){
                $articleArray = $articleSql->fetchAll(PDO::FETCH_ASSOC);   
            }
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
                    <h3><?php echo $infoTitle;?></h3>
                    <p class="about-us-content-paragraph">
                       <?php echo$infoText;?>
                    </p>
                    <button class="about-us-content-btn">
                        <a href="">Read More</a>
                    </button>
                </div>
                 <div class="about-image-section">
                    <img src="Images/accolades-pc.jpg" alt="">
                 </div>
            </div> 
            <?php
            foreach($articleArray as $article){

                    echo "<article class='article'>";
                    echo "<div class='article-content'>";
                    echo "<h2 class='article-h2'>{$article['about_us_main_title']}</h2>";
                    echo "<p>{$article['about_us_text']}</</p>";
                    echo "</div>";
                    echo "<div class='article-image' style=\"background-image: url('Images/{$article['image_file_name']}')\"></div>";
                    echo "</article>";
            }
            
            
            ?>
        </div>

        <!----
    
        <article class="article">
                <div class="article-content">
                    <h2 class="article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="article-image" style="background-image: url('Images/RazerNexus.webp');">
                 </div>
            </article>
        -->
    </main>
   <?php include "footer.php";?>
     <script src="navbar.js">
    </script>
</body>
</html>