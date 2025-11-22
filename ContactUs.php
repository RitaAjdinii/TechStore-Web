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
                <form action="" class="contact-form">
                    <input type="text" placeholder="Your Name" >
                    <input type="email" placeholder="Your email">
                    <textarea  name="send-message" id="">Send Message</textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>
    </main>
    <?php include "footer.php";?>
     <script src="navbar.js">
    </script>
</body>
</html>