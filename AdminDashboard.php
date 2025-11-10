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
            <li>Products Edit</li>
            <li>About Us Edit</li>
            <li>Login Edit</li>
            <li>Signup Edit</li>
            <li>Add Pages++</li>
            <form action="includes/logout.inc.php" method="POST"><li><button type=submit>Logout</button></li></form>
        </ul>

</nav>

<main class="main-container">
    <h1>List of Users added</h1>
    <table class="table">
        <thead >
            <tr>
                <th>ID:</th>
                <th>Username:</th>
                <th>Password:</th>
                <th>Email:</th>
                <th>Location:</th>
                <th>Birthdate:</th>
                <th>Is Admin:</th>
            </tr>
        </thead>
        <tbody>
          
          <?php

            include "classes/dbh.class.php";

            $dbs = new Dbh();
            $usersSql= $dbs->connect()->prepare('SELECT*FROM user;');
            
            if($usersSql->execute()){
                $usersArray = $usersSql->fetchAll(PDO::FETCH_ASSOC);
            }
                foreach ($usersArray as $user) {
                    echo "<tr>";
                    echo "<td>{$user['user_id']}</td>";
                    echo "<td>{$user['user_name']}</td>";
                    echo "<td>{$user['user_password']}</td>";
                    echo "<td>{$user['user_email']}</td>";
                    echo "<td>{$user['user_location']}</td>";
                    echo "<td>{$user['user_birthdate']}</td>";
                    echo "<td>" . ($user['user_isAdmin'] ? 'Yes' : 'No') . "</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href=''>Edit</a> 
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'>
                    <a href='' >Delete</a> 
                          </td>";
                    echo "</tr>";

            }
        
            /* while($usersArray = $usersSql->fetchAll(PDO::FETCH_ASSOC)){
                    echo "
                     <tr>
                        <td>$usersArray[user_id]</td>
                        <td>$usersArray[user_name]</td>
                        <td>$usersArray[user_password]</td>
                        <td>$usersArray[user_email]</td>
                        <td>$usersArray[user_location]</td>
                        <td>$usersArray[user_birthdate]</td>
                        <td>$usersArray[user_isAdmin]</td>
                    </tr>
                    
                          ";
                 
               
            }
                          */
                    
            
            ?>
                
<!--
                <tr>
                        <td>$usersArray[user_id]</td>
                        <td>$usersArray[user_name]</td>
                        <td>$usersArray[user_password]</td>
                        <td>$usersArray[user_email]</td>
                        <td>$usersArray[user_location]</td>
                        <td>$usersArray[user_birthdate]</td>
                        <td>$usersArray[user_isAdmin]</td>
            </tr>
                
-->
            
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