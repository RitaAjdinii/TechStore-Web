<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Table</title>
    <link rel="stylesheet" href="../styles/AdminDashboard.css">
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

          require_once "../controllers/contact-us-contr.php";
        $contact = new ContactUsContr();

        $contactsArray = $contact->getAll();



        foreach($contactsArray as $contact){
            echo "<tr>";
            echo "<td class='product'>{$contact['contact_id']}</td>";
            echo "<td class='product'>{$contact['contact_name']}</td>";
            echo "<td class='product'>{$contact['contact_message']}</td>";
            echo "<td class='btn-controls'  id='delete-btn'> 
                      <a href='contact-us-delete.php?id=$contact[contact_id]'>Delete</a> 
                  </td>";
             echo "</tr>";
        }

        ?>
    </tbody>
    </table>
</main>
</body>
</html>
