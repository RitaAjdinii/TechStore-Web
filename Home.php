
<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
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
            <li class="nav-item"><a href="Signup.php">Sign up</a></li>
        </ul>
        <div class="click-menu-addition">
          <ul class="nav-edited">
            <li class="item-edited"><a  href="Home.php">Home</a></li>
             <li class="item-edited"><a href="Producs.php">Products</a></li>
             <li class="item-edited"><a href="ContactUs.php">Contact Us</a></li>
             <li class="item-edited"><a href="AboutUs.php">About Us</a></li>
             <li class="item-edited"><a href="/Cart">Cart</a></li>
             <li class="item-edited"><a href="Signup.php">Sign up</a></li>
          </ul>
        </div>
    </nav>
    <div id="main-slider">
        <h1>MEET THE ALL-NEW RAZER-BLADE 16</h1>
        <p>SLIMMER.SMARTER.SHARPER</p>
        <div class="spanz">
            <a href="" >Learn more<span class="green">></span></a>
            <a href="" >Notify me<span class="green">></span></a>
        </div>
        <div class="controls">
            <button id ="left"><img src="Images/arrow_back_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button>
            <button id="right"><img src="Images/arrow_forward_ios_24dp_666666_FILL0_wght400_GRAD0_opsz24.svg"></button>
        </div>
    </div>
    <div class="main-image-container">
        <h1>RAZER ESPORTS LINE</h1>
        <p>WE PLAY TO WIN</p>
        <div class="spanz">
            <a href="" >Learn more<span class="green">></span></a>
            <a href="" >Notify me<span class="green">></span></a>
        </div>

    </div>
    <div class="main-image-container-two">
        <h1>MULTIPLY THE MAYHEM</h1>
        <p>SCORE 3X BORDERLANDS 4 GOLDEN KEYS</p>
        <div class="spanz">
            <a href="" >Learn more<span class="green">></span></a>
        </div>
    </div>
    <footer>

    </footer>
     <script>
      const hamburger = document.querySelector(".hamburger-menu");
      const navList = document.querySelector(".nav-list");
      const clickMenu = document.querySelector(".click-menu-addition");


      const leftBtn = document.querySelector("#left");
        const rightBtn = document.querySelector("#right");
        const mainSlider = document.querySelector("#main-slider");

        let images = [
            {
                name:"images/RazerNexus.webp"
            },
            {
                name:"images/gamingLaptop2.jpeg"
            },
            {
                name:"images/RazerMainSlider.webp"
            },{
                name:"images/razer-blade16-homepage.webp"
            },{
                name:"images/Razer.webp"
            } 

        ]


window.addEventListener("DOMContentLoaded",()=>{
    let randomIndex = Math.floor(Math.random()*images.length)

    mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
    rightBtn.addEventListener("click",(e)=>{
        if(e.target.tagName==="IMG"){
    
            randomIndex++
            console.log(randomIndex)
            if(randomIndex>images.length-1){
                randomIndex=0
            }
             mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
               

           
        }
    });
     
    
    
    leftBtn.addEventListener("click",(e)=>{
        if(e.target.tagName==="IMG"){

            --randomIndex
            if(randomIndex<0){
                randomIndex = images.length-1
            }
             mainSlider.style.backgroundImage = `url(${images[randomIndex].name})`;
            
               


    }});
    
    


});














    hamburger.addEventListener("click",()=>{
      clickMenu.classList.toggle("on");
      hamburger.classList.toggle("rotate");
    });
    </script>
      

</body>
</html>

