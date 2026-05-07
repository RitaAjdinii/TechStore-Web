<?php

session_start();
if (isset($_SESSION['userAdmin']) && $_SESSION['userAdmin'] == 1) {
    require_once("../controllers/cart-contr.php");

    $cart = new CartContr();

    $userId = $_GET["id"] ?? null;

    $username = $userId ? $cart->getUsername($userId) : "Unknown User";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Purchases By User</title>
        <link rel="stylesheet" href="../styles/AdminDashboard.css">
    </head>

    <body>

        <?php include "adminHeader.php"; ?>
        <main class="main-container">
            <h1>Purchase of: <?php echo htmlspecialchars($username ?? 'Guest'); ?></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Purchase id:</th>
                        <th>Purchase name:</th>
                        <th>Purchase price:</th>
                        <th>Quantity:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $purchasesArray = $cart->getUserPurchases($userId);
                    foreach ($purchasesArray as $purchase) {
                        echo "<tr>";
                        echo "<td class='user'><a href='user-table.php?id=$purchase[user_id]?' class='purchase-table-link'>{$purchase['purchase_id']}</a></td>";
                        echo "<td class='user'><a href='user-table.php?id=$purchase[user_id]' class='purchase-table-link'>{$purchase['product_name']}</a></td>";
                        echo "<td class='user'>{$purchase['purchase_price']}</td>";
                        echo "<td class='user'>{$purchase['quantity']}</td>";
                        echo "<td class='btn-controls' id='edit-btn'>
                                <a href='edit-user.php?id=$purchase[user_id]'>Edit</a>
                            </td>";
                        echo "<td class='btn-controls'  id='delete-btn'> 
                        <a href='delete-user.php?id=$purchase[user_id]' >Delete</a> 
                            </td>";
                        echo "</tr>";
                        echo "</a>";
                    }


                    ?>

                </tbody>
            </table>
        </main>
    </body>

    </html>

<?php

} else {
    header('location:Login.php');
}
