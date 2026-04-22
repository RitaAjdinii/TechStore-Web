<?php
session_start()
?>
<nav>
        <ul class="nav-list">
            <div class="hamburger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
                <li class="nav-item"><a href="#" class="logo">TEKK</a></li>
                <li class="nav-item"><a  href="Home.php">Home</a></li>
                <li class="nav-item"><a href="Products.php">Products</a></li>
                <li class="nav-item"><a href="ContactUs.php">Contact Us</a></li>
                <li class="nav-item"><a href="AboutUs.php">About Us</a></li>
                <li class="nav-item"><a href="Cart.php"><img src="../Images/cart.svg" alt=""></a></li>
                <?php

                 if(isset($_SESSION['userAdmin']) && $_SESSION['userAdmin']==1){
                                     echo "<li class='nav-item'><a href='AdminDashboard.php'>Dashboard</a></li>";
                  }
                if(isset($_SESSION['userid'])){
                 echo "<li class='nav-item'><form action='../includes/logout.inc.php'><button type='submit' class='nav-item'>Log out</button></form></li>";
                  }else{
                    echo "<li class='nav-item'><a href='Login.php'>Sign Up</a></li>";
                  }
                  ?>
            </ul>
                <div class="click-menu-addition">
                    <ul class="nav-edited">
                            <li class="item-edited"><a href="Home.php">Home</a></li>
                            <li class="item-edited"><a href="Products.php">Products</a></li>
                            <li class="item-edited"><a href="ContactUs.php">Contact Us</a></li>
                            <li class="item-edited"><a href="AboutUs.php">About Us</a></li>
                            <li class="item-edited"><a href="Cart.php">Cart</a></li>
                            <?php

                             if(isset($_SESSION['userAdmin']) && $_SESSION['userAdmin']==1){
                                     echo "<li class='item-edited'><a href='AdminDashboard.php'>Dashboard</a></li>";
                              }
                              if(isset($_SESSION['userid'])){
                                echo "<li class='item-edited'><form action='../includes/logout.inc.php'><button type='submit' class='item-edited'>Log out</button></form></li>";
                              }else{
                                    echo "<li class='item-edited'><a href='Login.php'>Sign Up</a></li>";
                                }
                            
                            ?>
                    </ul>
                </div>
    </nav>
     <script src="../styles/navbar.js"></script>