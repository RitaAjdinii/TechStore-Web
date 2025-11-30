<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php";?>
    <main>
        <section class="contact-us-section">
            <div class="contact-us-container">
                <h2>Contact Us</h2>
                <form action="includes/contact-us.inc.php" class="contact-form" method="post">
                    <input type="text" placeholder="Your Name" name="name">
                    <input type="text" placeholder="Your email" name="email">
                    <textarea id="" name="message" placeholder="Send message"></textarea>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </section>
    </main>
    <?php include "footer.php";?>
     <script src="navbar.js">
    </script>
</body>
</html>