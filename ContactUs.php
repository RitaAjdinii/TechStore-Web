<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
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
             <main>
        <section class="contact-us-section">
            <div class="contact-us-container">
                <h2>Contact Us</h2>
                <form action="includes/contact-us.inc.php" class="contact-form" method="post">
                    <input type="text" placeholder="Your Name" name="name">
                    <input type="text" placeholder="Your email" name="email">
                    <textarea id="" name="message" placeholder="Send message"></textarea>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </section>
    </main>
    <?php include "footer.php";?>
     <script src="navbar.js">
    </script>
</body>
</html>