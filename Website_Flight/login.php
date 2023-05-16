<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/styleLogin.css">

</head>
<body>
	<section class = "center-box">
	<form action="login.php" method="post" class ="box">
		<h2>Login</h2>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" class = "input"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" class = "input"><br><br>
		<input type="submit" name="submit" value="Login" class = "btn">
	</form>
</section>


	<?php
	// Start a session
	session_start();

	// Define database connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "businessjet";

	// Create a connection to the database
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Check if the form was submitted
	if (isset($_POST['submit'])) {
		// Collect user input from the form
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Query the database for the user
		$sql1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $sql1);

		// If the user exists in the database, create a session and redirect to the home page
		if (mysqli_num_rows($result) == 1) {
			// Store the user ID in the session
			$_SESSION['userid'] = mysqli_fetch_assoc($result)['id'];
			// Redirect to the home page
			header("Location: index.php");
			exit;
		}
		// If the user does not exist in the database, display an error message
		else {
			echo "<p>Invalid username or password. Please try again.</p>";
		}
	}

	// Close the database connection
	mysqli_close($conn);
	?>
</body>
</html>