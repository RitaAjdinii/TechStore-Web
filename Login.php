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



    <div class="container login_container">
        <div class="login-container">
            <h3>TECH ID LOGIN</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="EMAIL ">
                <input type="password"name="password" placeholder="PASSWORD">
                <p id="forgor"><a href="">Forgot Password?</a></p>
                <button id="login-btn" type="submit" name="submit">LOG IN</button>
                <p id="acc" ><a>Don't have an account yet?</a></p>
                <p id="create-id" class="form-btns"><a >Create Tech ID<span class="green">></span></a></p>
            </form>
        </div>
    </div>

    <?php
     $php_test = $_SESSION["userid"];
    ?>



        <div class="container signup_container off">
            <div class="signup-container">
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
                    <div class="isadmin">
                        <label for="" id="admin">Is Administrator</label>
                    <input type="checkbox" id="admin-check">
                    </div>
                    
                    <button type="submit" name="submit" id="login-btn">Sign in</button>
                    <p id="acc" class="form-btns"><a >Already have an account?</a></p>
                </form>
            </div>
    </div>

    <script>
    

    const form_btns= document.querySelectorAll(".form-btns");
    const containers = document.querySelectorAll(".container");
    const loginContainer = document.querySelector(".login_container");
    const signupContainer = document.querySelector(".signup_container");


    form_btns.forEach((btn)=>{
        btn.addEventListener("click",()=>{
            const parent = btn.parentElement.parentElement;
           if(parent.className=="login-container"){
            loginContainer.classList.toggle("off");
            signupContainer.classList.remove("off");
           }else{
             loginContainer.classList.toggle("off");
             signupContainer.classList.toggle("off");
           }
        });
    });



    </script>
</body>
</html>