<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/styleSignUp.css">
</head>
<body>
	<section class = "center-box">
	<form action="signup.php" method="post" class ="box">
		<h2> Sign Up </h2><br><br>
		<label for="username" class = "labels">Username:</label>
		<input type="text" id="username" name="username" class = "input"><br><br>
		<label for="password"  class = "labels">Password:</label>
		<input type="password" id="password" name="password" class = "input"><br><br>
		<label for="email"  class = "labels">Email:</label>
		<input type="email" id="email" name="email" class = "input"><br><br>
		<input type="submit" name="submit" value="Sign Up" class = "btn">
	</form>
	</section>

	<?php
	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		// Connect to database
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "businessjet";

		$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Check if username already exists
		$sql1 = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($result) > 0) {
			echo "Username already exists";
		} else {
			// Insert new user into database
			$sql1 = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

			if (mysqli_query($conn, $sql1)) {
				echo "Sign up successful";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			if (isset($_POST['submit'])) {
				// Redirect to the login page
				header("Location: login.php");
				exit;
			}
		}

		mysqli_close($conn);
	}
	?>
</body>
</html>
