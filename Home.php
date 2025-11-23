
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
    <?php include "header.php";?>
    <?php include "main-home-slider.php";?>
    <main>
        <section class="home-content">
            <article class="home-article">
                 <div class="home-article-content">
                    <h2 class="home-article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="home-article-image" style="background-image:url('Images/Lenovo IdeaCentre AIO 3i, All-in-One Desktop.webp');">
                </div>
            </article>
            <article class="home-article">
                 <div class="home-article-content">
                    <h2 class="home-article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="home-article-image" style="background-image: url('Images/gamingLaptop1.jpeg');">
                 </div>
            </article>
            <article class="home-article">
                 <div class="home-article-content">
                    <h2 class="home-article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="home-article-image" style="background-image: url('Images/MainImageSlider2.webp');">
                 </div>
            </article>
            <article class="home-article">
                 <div class="home-article-content">
                    <h2 class="home-article-h2">This is an article</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, non libero? Incidunt, et omnis eaque pariatur modi deserunt saepe consectetur!</p>
                </div>
                <div class="home-article-image" style="background-image: url('Images/RazerNexus.webp');">
                 </div>
            </article>
        </section>
    </main>
    <?php include "footer.php";?>
     <script src="main-home-slider.js"></script>
     <script src="navbar.js"></script>
</body>
</html>

