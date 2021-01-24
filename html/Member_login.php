<!DOCTYPE html>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
	<title>Bazaar Cermaics Member Login</title>
</head>
<body>
    <header>
		<?php include 'include_files/Navigation.inc';
         include 'include_files/Banner.inc';
	include 'include_files/login.php';
		?>
    </header>
    <h1>Member Login</h1>
	<p>Use the form below to login to the Bazaar Ceramics Members page</p>
    <form action="include_files/login.php" method="post">
	<label for="Username">Username</label>
	<input type="text" name="Username" placeholder="Username" required>
		<br>
	<label for="password">Password</label>
	<input type="password" name="password" placeholder="Password" required>
		<br>
	<button type="submit">Login</button>
		<button type="reset">Reset</button>
	</form>
	<?php 
	if(!isset($_GET['login'])) {
			exit();
		} else {
			$signupCheck = $_GET['login'];
			
			if($signupCheck == "error") {
			echo '<p class="error">Your username or password is incorrect. Please try again</p>';
			exit(); 
			}
	}
	?>
</body>
</html>