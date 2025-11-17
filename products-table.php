<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
     <nav>
        <ul class="nav-list">
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </ul>
        <ul class="nav-content">
            <li>Users Info</li>
            <li>Admin profile</li> 
            <li>Home Page edit</li>
            <li>Contact Us edit</li>
            <li><a href="">Products Add</a></li>
            <li><a href="ProductsTable.php">Products Table</a></li>
            <li>About Us Edit</li>
            <li>Login Edit</li>
            <li>Signup Edit</li>
            <li>Add Pages++</li>
            <form action="includes/logout.inc.php" method="POST"><li><button type=submit>Logout</button></li></form>
        </ul>

</nav>

<main class="main-container">
    <h1>Products List</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Description:</th>
                <th>Price:</th>
            </tr>
        </thead>
    <tbody>
        <?php
         include "classes/dbh.class.php";
        $dbs = new Dbh();
        $productSql = $dbs->connect()->prepare("SELECT * FROM product;");
        if($productSql->execute()){
            $productsArray=$productSql->fetchAll(PDO::FETCH_ASSOC);
        }



        foreach($productsArray as $product){
            echo "<tr>";
                    echo "<td class='product'>{$product['product_id']}</td>";
                    echo "<td class='product'>{$product['product_name']}</td>";
                    echo "<td class='product'>{$product['product_description']}</td>";
                    echo "<td class='product'>{$product['product_price']}</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href=''>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                    <a href='' >Delete</a> 
                          </td>";
                    echo "</tr>";
        }

        ?>
    </tbody>
    </table>
</main>




     <script>

        const hamburger = document.querySelector(".hamburger");
        const navContent = document.querySelector(".nav-content");
        let isOpen = false;

        hamburger.addEventListener("click",()=>{
            isOpen = !isOpen;
             hamburger.classList.toggle("toggle-hamburger");
             if(isOpen == true){
                navContent.classList.add("toggle-sidebar");
             }else{
                navContent.classList.remove("toggle-sidebar");
             }
           
        });

       
     </script>
</body>
</html>
