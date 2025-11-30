<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Table</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <?php include "adminHeader.php";?>

<main class="main-container">
    <h1>Contact Us Table</h1>
    <table>
        <thead>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Email:</th>
                <th>Message:</th>
            </tr>
        </thead>
    <tbody>
        <?php
         include "classes/dbh.class.php";
        $dbs = new Dbh();
        $contactSql = $dbs->connect()->prepare("SELECT * FROM contact_us;");
        if($contactSql->execute()){
            $contactsArray=$contactSql->fetchAll(PDO::FETCH_ASSOC);
        }



        foreach($contactsArray as $contact){
            echo "<tr>";
                    echo "<td class='product'>{$contact['contact_id']}</td>";
                    echo "<td class='product'>{$contact['contact_name']}</td>";
                    echo "<td class='product'>{$contact['contact_message']}</td>";
                    echo "<td class='btn-controls' id='edit-btn'>
                            <a href='contact-us-edit.php?id=$contact[contact_id]'>Edit</a>
                          </td>";
                    echo "<td class='btn-controls'  id='delete-btn'> 
                             <a href='contact-us-delete.php?id=$contact[contact_id]' >Delete</a> 
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
