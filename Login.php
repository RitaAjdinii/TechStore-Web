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
            <li class="nav-item"><a href="Home.html"><img src="Images/logo.svg"  class="logo">TechStore ID</a></li>
            <li class="nav-item"><a href=""><img src="Images/world.svg"></a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="login-container">
            <h3>TECH ID LOGIN</h3>
            <form>
                <input type="text"name="fname" placeholder="EMAIL ADDRESS">
                <input type="text"name="fname" placeholder="PASSWORD">
                <p id="forgor"><a href="">Forgot Password?</a></p>
                <button id="login-btn">LOG IN</button>
                <p id="acc"><a href="Signup.html">Don't have an account yet?</a></p>
                <p id="create-id"><a href="">Create Tech ID<span class="green">></span></a></p>
            </form>
        </div>
    </div>
</body>
</html>