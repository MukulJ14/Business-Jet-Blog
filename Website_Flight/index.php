<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bizjets Inc.</title>
        <link rel="icon" type="image/x-icon" href="/Users/mukuljindal/Desktop/Website Flight/img/favicon.ico">
    </head>
    <body>
        <nav class="navbar">
            <img src = "img/logo.jpg" class = "logo">
            <ul class="navlist">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "fleet.php">Fleet</a></li>
                <li><a href = "#contact">Contact</a></li>
            </ul>
            <div class="rightNav">
                <button class="btn logout">Log Out</button>
            </div>
        </nav>

        <section id="home" class = "firstSection" style = "
            background-image : url('https://www.stratosjets.com/wp-content/uploads/2013/09/jet-charter-catering-and-concierge.jpg');
            background-color: rgb(0, 0, 0, 0.7);
            background-size: cover;
            background-blend-mode: darken;
            color: white;
        ">
            <div class="box-main">
                <div class="firstHalf">
                    <p class = "text-big">Visit your paradise in our chariot</p>
                    <p class = "text-small">It's gonna be fun to travel and fly off to nowhere</p>
                </div>
                <div class="secondHalf">
                </div>
            </div>
        </section>


        <section class = "secondSection box boxRight" id = "services">
            <p>Fly to your dreams with our hassle-free, where adventure meets convenience</p>
            <img src = "img/client_smile.jpg" height="50%" class = "background">
        </section>
    
        <section class = "thirdSection box boxLeft">
            <img src = "img/meeting.jpeg" height="50%" style=" border-color : rgb(30, 30, 30)">
            <p>We're here for your convenience</p>
        </section>

        <section class = "fourthSection">
            <p> Follow us on</p>
            <img src = "img/insta.png" height="50%" class = "social">
            <img src = "img/facebook.png" height="50%" class = "social">
            <img src = "img/linkedin.png" height="50%" class = "social">
            <img src = "img/youtube.png" height="50%" class = "social">
            
        </section>

        <section class="contact" id = "contact">
            <p>Contact Us</p>
            <div class="form">
            <form action="index.php" method="post">
                <input class="contact-input" type="text" name="name" id="name" placeholder="Enter name" required>
                <input class="contact-input" type="email" name="email" id="email" placeholder="Enter email" required>
                <textarea class="contact-input" name="message" id="message" placeholder="Enter your concern here" required></textarea>
                <input class = "sub-btn" type = "submit" name = "submit" value = "Submit">
            </div>
        </section>

        <footer>
            <p class="text-footer"> Copyright &copy; Bizjets Inc. 2023. All Rights Reserved</p>
        </footer>

        <script src="index.js"></script>

        <?php
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
    
            // Connect to database
            $servername = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "businessjet";
    
            $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO contact (name, Email, comment) VALUES ('$name', '$email', '$message')";

			if (mysqli_query($conn, $sql)) {
				echo "Message successful";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
        }
        ?>

    </body>
</html>