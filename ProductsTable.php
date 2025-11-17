<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
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
