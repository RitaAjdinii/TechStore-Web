<?php
session_start();
if (isset($_SESSION['userAdmin'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="../styles/style.css">
    </head>

    <body>
        <nav>
            <ul class="nav-list">
                <div class="hamburger-menu">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <li class="nav-item"><a href="#" class="logo">TEKK</a></li>
                <li class="nav-item"><a href="Home.php">Home</a></li>
                <li class="nav-item"><a href="Products.php">Products</a></li>
                <li class="nav-item"><a href="ContactUs.php">Contact Us</a></li>
                <li class="nav-item"><a href="AboutUs.php">About Us</a></li>
                <li class="nav-item"><a href="Cart.php"><img src="../Images/cart.svg" alt=""></a></li>
                <?php

                if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == 1) {
                    echo "<li class='nav-item'><a href='AdminDashboard.php'>Dashboard</a></li>";
                }
                if (isset($_SESSION['userid'])) {
                    echo "<li class='nav-item'><form action='../includes/logout.inc.php'><button type='submit' class='nav-item'>Log out</button></form></li>";
                } else {
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

                    if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == 1) {
                        echo "<li class='item-edited'><a href='AdminDashboard.php'>Dashboard</a></li>";
                    }
                    if (isset($_SESSION['userid'])) {
                        echo "<li class='item-edited'><form action='../includes/logout.inc.php'><button type='submit' class='item-edited'>Log out</button></form></li>";
                    } else {
                        echo "<li class='item-edited'><a href='Login.php'>Sign Up</a></li>";
                    }

                    ?>
                </ul>
            </div>
        </nav>
        <script src="../styles/navbar.js"></script>
        <main>
            <form class="cart-main" enctype="multipart/form-data" action="cart-checkout.php" method="post">
                <div class="cart-container">
                    <?php
                    require_once "../controllers/cart-contr.php";
                    $cart = new CartContr();
                    $cartArray = $cart->getAll($_SESSION['userid']);
                    //var_dump($cartArray);
                    //die();

                    foreach ($cartArray as $cart) {
                        echo "<table class='table cart-item'>";
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Product Details</th>';
                        echo '<th>Quantity</th>';
                        echo '<th>Price</th>';
                        echo '<th>Total</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        echo '<tr>';
                        echo '<td>';
                        echo "<h3>{$cart['product_name']}</h3>";
                        echo '<img src="' . $cart['image_file_path'] . '" alt="">';
                        echo '</td>';
                        echo '<td class="quantity">';
                        echo '<button class="minus" type="button">-</button><span class="qty-value">1</span><button type="button"class="plus">+</button>';
                        echo '<input type="hidden" value="1" class="quantity" name="quantity_' . $cart["product_id"] . '"/>';
                        echo '</td>';
                        echo "<td class='price'>{$cart["product_price"]}€</td>";
                        echo '<td class="total"></td><td></td>';
                        echo '</tr>';
                        echo '</tbody>';
                        echo '</table>';
                    }


                    ?>

                </div>
                <div class="total-container">
                    <h3>Total</h3>
                    <hr>
                    <h4>Sub Total:</h4>
                    <h4 class='sub-total'></h4>
                    <hr>
                    <h4>Delivery:</h4>
                    <p>Standard Delivery(free)</p>
                    <button type="submit" name="submit">Purchase</button>
                </div>
            </form>

        </main>
        <script>
            // 1. Get all cart item tables
            const cartItems = document.querySelectorAll('.cart-item');
            const subTotal = document.querySelector('.sub-total');
            let subTotalValue = 0;
            // 2. Use forEach (capital E)
            cartItems.forEach((item) => {
                // 3. Use item.querySelector to look ONLY inside this specific table
                const minusBtn = item.querySelector('.minus');
                const plusBtn = item.querySelector('.plus');
                const qtyDisplay = item.querySelector('.qty-value');
                const priceTd = item.querySelector('.price');
                const totalTd = item.querySelector('.total');
                const quantity = item.querySelector('.quantity');
                const quantityInput = item.querySelector('input');
                const priceValue = parseFloat(priceTd.innerText);
                let currentQty = 1;
                subTotalValue += priceValue;

                // 4. Function to update the display for THIS row
                const updateRow = (row) => {
                    qtyDisplay.innerText = currentQty;
                    totalTd.innerText = (currentQty * priceValue).toFixed(2) + '€';
                    quantityInput.value = currentQty;
                };

                const addTotal = (row) => {
                    subTotalValue += priceValue
                    subTotal.innerText = subTotalValue;
                }

                const subtractTotal = (row) => {
                    subTotalValue -= priceValue
                    subTotal.innerText = subTotalValue;

                }


                minusBtn.addEventListener("click", () => {
                    if (currentQty > 0) {
                        currentQty--;
                        quantity.innerText.value--;
                        updateRow();
                        subtractTotal();

                    }
                });

                plusBtn.addEventListener("click", () => {
                    currentQty++;
                    quantity.innerText.value++;
                    updateRow();
                    addTotal();

                });

            });
            subTotal.innerText = subTotalValue;
        </script>
    </body>

    </html>

<?php
} else {
    header('location:Login.php');
}

?>