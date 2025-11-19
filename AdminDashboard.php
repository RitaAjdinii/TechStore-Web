<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
     <?php include "adminHeader.php";?>

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
                    echo "<td class='user'>{$user['user_id']}</td>";
                    echo "<td class='user'>{$user['user_name']}</td>";
                    echo "<td class='user'>{$user['user_password']}</td>";
                    echo "<td class='user'>{$user['user_email']}</td>";
                    echo "<td class='user'>{$user['user_location']}</td>";
                    echo "<td class='user'>{$user['user_birthdate']}</td>";
                    echo "<td class='user'>" . ($user['user_isAdmin'] ? 'Yes' : 'No') . "</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href='classes/edit.php?id=$user[user_id]'>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                    <a href='classes/delete.php?id=$user[user_id]' >Delete</a> 
                          </td>";
                    echo "</tr>";

                }
        

                    
            
            ?>
            
        </tbody>
    </table>
</main>




     <script src="admin-navbar.js">   
     </script>
</body>
</html>