<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="ContactUs.css">
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
    <div class="title">
        <h1>CONTACT US</h1>
    </div>
    <div class="container">
        <form action="" class="form-group">
            <div class="item">
                <label for="name">Your name</label>
                <input type="text" placeholder="Name">
            </div>
            <div class="item">
                <label for="email">Email</label>
                <input type="text" placeholder="Email">
            </div>
            <div class="item">
                <label for="phone">Phone</label>
                <input type="text" placeholder="Phone">
            </div>
            <div class="item">
                <label for="message">Message</label>
                <textarea name="" id="" placeholder="Message"></textarea>
            </div>
            <button>SUBMIT</button>
        </form>
    </div>
    
    
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