<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href="Home.php"><img src="Images/logo.svg"  class="logo">TechStore ID</a></li>
            <li class="nav-item"><a href=""><img src="Images/world.svg"></a></li>
        </ul>
    </nav>


    <?php
    if(isset($_SESSION["userid"])){
    ?>

    <div class="container">
        <div class="login-container">
            <h3>TECH ID LOGIN</h3>
            
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="EMAIL ">
                <input type="password"name="password" placeholder="PASSWORD">
                <p id="forgor"><a href="">Forgot Password?</a></p>
                <button id="login-btn" type="submit" name="submit">LOG IN</button>
                <p id="acc"><a href="Signup.php">Don't have an account yet?</a></p>
                <p id="create-id"><a href="Signup.php">Create Tech ID<span class="green">></span></a></p>
            </form>
        </div>
    </div>

    <?php }else{?>
        <div class="container">
        <div class="login-container">
            <div class="top-text">
                <h3>CREATE RAZER ID ACCOUNT</h3>
                <p id="tekk-id">Tekk ID is a unified account for all TEKK devices</p>    
            </div>
            <form action="includes/signup.inc.php" method="post">
                <input type="text"name="username" placeholder="TECH ID (your name)">
                <select name="location" id="location">
                    <option value="">Location</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Aland Islands">Aland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antartica">Antartica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                </select>

                <input class="input-container" type="date" name="birthdate">
                <input type="text" name="email" placeholder="EMAIL ADDRESS">
                <input type="password" name="password" placeholder="PASSWORD">
                <button type="submit" name="submit" id="login-btn">LOG IN</button>
                <p id="acc"><a href="Login.php">Already have an account?</a></p>
                <p id="create-id"><a href="Login.php">Log In<span class="green">></span></a></p>
            </form>
        </div>
    </div>
        <?php }?>
</body>
</html>